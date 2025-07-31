<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'Method not allowed']);
    exit;
}

class HemoglobinAnalyzer {
    
    private $normalRanges = [
        'male' => ['min' => 13.5, 'max' => 17.5],
        'female' => ['min' => 12.0, 'max' => 15.5],
        'child' => ['min' => 11.0, 'max' => 16.0]
    ];
    
    public function analyzeText($text) {
        // Extract hemoglobin values from text using regex patterns
        $patterns = [
            '/hemoglobin[:\s]*(\d+\.?\d*)\s*g\/dl/i',
            '/hb[:\s]*(\d+\.?\d*)\s*g\/dl/i',
            '/haemoglobin[:\s]*(\d+\.?\d*)\s*g\/dl/i',
            '/hgb[:\s]*(\d+\.?\d*)\s*g\/dl/i',
            '/hemoglobin[:\s]*(\d+\.?\d*)/i',
            '/hb[:\s]*(\d+\.?\d*)/i'
        ];
        
        foreach ($patterns as $pattern) {
            if (preg_match($pattern, $text, $matches)) {
                return floatval($matches[1]);
            }
        }
        
        return null;
    }
    
    public function classifyLevel($level, $gender = 'female') {
        if (!isset($this->normalRanges[$gender])) {
            $gender = 'female'; // Default fallback
        }
        
        $range = $this->normalRanges[$gender];
        
        if ($level >= $range['min'] && $level <= $range['max']) {
            return [
                'status' => 'GOOD',
                'class' => 'result-good',
                'message' => 'Your hemoglobin level is within the normal range.',
                'advice' => 'Keep maintaining a healthy diet rich in iron, vitamin B12, and folate. Continue your current lifestyle!'
            ];
        } elseif ($level < $range['min']) {
            if ($level >= $range['min'] - 1.5) {
                return [
                    'status' => 'AVERAGE',
                    'class' => 'result-average',
                    'message' => 'Your hemoglobin level is slightly below normal.',
                    'advice' => 'Consider including more iron-rich foods like spinach, red meat, beans, and fortified cereals. Consult a healthcare provider if symptoms persist.'
                ];
            } else {
                return [
                    'status' => 'BAD',
                    'class' => 'result-bad',
                    'message' => 'Your hemoglobin level is significantly low (anemia).',
                    'advice' => 'Please consult with a healthcare provider immediately. You may need iron supplements or further medical evaluation.'
                ];
            }
        } else {
            return [
                'status' => 'AVERAGE',
                'class' => 'result-average',
                'message' => 'Your hemoglobin level is above normal range.',
                'advice' => 'High hemoglobin levels may indicate dehydration or other conditions. Please consult with a healthcare provider for evaluation.'
            ];
        }
    }
    
    public function generateReport($level, $gender, $patientName = '') {
        $classification = $this->classifyLevel($level, $gender);
        $range = $this->normalRanges[$gender];
        
        return [
            'hemoglobin_level' => $level,
            'unit' => 'g/dL',
            'gender' => $gender,
            'patient_name' => $patientName,
            'normal_range' => $range,
            'classification' => $classification,
            'timestamp' => date('Y-m-d H:i:s'),
            'recommendations' => $this->getRecommendations($classification['status'])
        ];
    }
    
    private function getRecommendations($status) {
        switch ($status) {
            case 'GOOD':
                return [
                    'Continue eating iron-rich foods',
                    'Maintain regular exercise',
                    'Stay hydrated',
                    'Regular health check-ups'
                ];
            case 'AVERAGE':
                return [
                    'Increase iron-rich food intake',
                    'Consider vitamin C with iron-rich meals',
                    'Avoid tea/coffee with meals',
                    'Consult healthcare provider',
                    'Monitor symptoms like fatigue'
                ];
            case 'BAD':
                return [
                    'Seek immediate medical attention',
                    'Follow prescribed iron supplements',
                    'Eat iron-rich foods daily',
                    'Avoid blood donation',
                    'Monitor for symptoms of anemia'
                ];
            default:
                return [];
        }
    }
}

// Handle the request
try {
    $input = json_decode(file_get_contents('php://input'), true);
    
    if (!$input) {
        throw new Exception('Invalid JSON input');
    }
    
    $analyzer = new HemoglobinAnalyzer();
    
    if (isset($input['text'])) {
        // Analyze text for hemoglobin levels
        $level = $analyzer->analyzeText($input['text']);
        
        if ($level === null) {
            echo json_encode([
                'success' => false,
                'error' => 'No hemoglobin level found in the provided text'
            ]);
            exit;
        }
        
        $gender = $input['gender'] ?? 'female';
        $patientName = $input['patient_name'] ?? '';
        
        $report = $analyzer->generateReport($level, $gender, $patientName);
        
        echo json_encode([
            'success' => true,
            'data' => $report
        ]);
        
    } elseif (isset($input['level'])) {
        // Direct level analysis
        $level = floatval($input['level']);
        $gender = $input['gender'] ?? 'female';
        $patientName = $input['patient_name'] ?? '';
        
        $report = $analyzer->generateReport($level, $gender, $patientName);
        
        echo json_encode([
            'success' => true,
            'data' => $report
        ]);
        
    } else {
        throw new Exception('Missing required parameters');
    }
    
} catch (Exception $e) {
    http_response_code(400);
    echo json_encode([
        'success' => false,
        'error' => $e->getMessage()
    ]);
}
?>
