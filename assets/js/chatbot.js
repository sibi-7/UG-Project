class HemoglobinChatbot {
    constructor() {
        this.isOpen = false;
        this.messages = [];
        this.init();
    }

    init() {
        this.createChatbotHTML();
        this.bindEvents();
        this.addWelcomeMessage();
    }

    createChatbotHTML() {
        const chatbotHTML = `
            <div class="chatbot-container">
                <button class="chatbot-toggle" id="chatbotToggle" title="Hemoglobin AI Assistant">🤖</button>
                <div class="chatbot-window" id="chatbotWindow">
                    <div class="chatbot-header">
                        <h4>Hemoglobin AI Assistant</h4>
                        <button class="chatbot-close" id="chatbotClose">&times;</button>
                    </div>
                    <div class="chatbot-messages" id="chatbotMessages"></div>
                    <div class="chatbot-input-area">
                        <div class="file-upload-area" id="fileUploadArea">
                            <div class="upload-icon">⬆️</div>
                            <div class="upload-text">Click or drag your medical report here</div>
                            <input type="file" id="fileInput" accept=".pdf,.jpg,.jpeg,.png,.txt" style="display: none;">
                        </div>
                        <div class="chatbot-input-group">
                            <input type="text" class="chatbot-input" id="chatbotInput" placeholder="Type your message...">
                            <button class="chatbot-send" id="chatbotSend">Send</button>
                        </div>
                    </div>
                </div>
            </div>
        `;
        document.body.insertAdjacentHTML('beforeend', chatbotHTML);
    }

    bindEvents() {
        document.getElementById('chatbotToggle').addEventListener('click', () => this.toggleChatbot());
        document.getElementById('chatbotClose').addEventListener('click', () => this.closeChatbot());
        document.getElementById('chatbotSend').addEventListener('click', () => this.sendMessage());
        document.getElementById('chatbotInput').addEventListener('keypress', (e) => {
            if (e.key === 'Enter') this.sendMessage();
        });
        const fileUploadArea = document.getElementById('fileUploadArea');
        const fileInput = document.getElementById('fileInput');
        fileUploadArea.addEventListener('click', () => fileInput.click());
        fileUploadArea.addEventListener('dragover', this.handleDragOver.bind(this));
        fileUploadArea.addEventListener('dragleave', this.handleDragLeave.bind(this));
        fileUploadArea.addEventListener('drop', this.handleFileDrop.bind(this));
        fileInput.addEventListener('change', this.handleFileSelect.bind(this));
    }

    toggleChatbot() {
        const window = document.getElementById('chatbotWindow');
        this.isOpen = !this.isOpen;
        window.style.display = this.isOpen ? 'flex' : 'none';
    }

    closeChatbot() {
        const window = document.getElementById('chatbotWindow');
        this.isOpen = false;
        window.style.display = 'none';
    }

    addMessage(content, isUser = false, isTyping = false) {
        const messagesContainer = document.getElementById('chatbotMessages');
        const messageDiv = document.createElement('div');
        messageDiv.className = `message ${isUser ? 'user' : 'bot'}`;
        if (isTyping) {
            messageDiv.innerHTML = `<div class="typing-indicator">...</div>`;
        } else {
            messageDiv.innerHTML = `<div class="message-content">${content}</div>`;
        }
        messagesContainer.appendChild(messageDiv);
        messagesContainer.scrollTop = messagesContainer.scrollHeight;
        return messageDiv;
    }

    addWelcomeMessage() {
        setTimeout(() => {
            this.addMessage(
                `<div style="text-align: center;">
                    <strong>Welcome to Hemoglobin AI Assistant!</strong><br>
                    Upload your blood report and I will help you analyze your hemoglobin levels.
                </div>`
            );
        }, 500);
    }

    sendMessage() {
        const input = document.getElementById('chatbotInput');
        const message = input.value.trim();
        if (!message) return;
        this.addMessage(message, true);
        input.value = '';
        setTimeout(() => this.handleUserMessage(message), 1000);
    }

    handleUserMessage(message) {
        const lower = message.toLowerCase();
        if (lower.includes('hemoglobin') || lower.includes('blood') || lower.includes('report')) {
            this.addMessage(
                `Please upload a blood report file. I analyze reports for hemoglobin values.`
            );
        } else {
            this.addMessage(`I'm specialized in analyzing hemoglobin blood reports. Please upload your report.`);
        }
    }

    handleDragOver(e) {
        e.preventDefault();
        document.getElementById('fileUploadArea').classList.add('dragover');
    }

    handleDragLeave(e) {
        e.preventDefault();
        document.getElementById('fileUploadArea').classList.remove('dragover');
    }

    handleFileDrop(e) {
        e.preventDefault();
        document.getElementById('fileUploadArea').classList.remove('dragover');
        const files = e.dataTransfer.files;
        if (files.length > 0) this.processFile(files[0]);
    }

    handleFileSelect(e) {
        const file = e.target.files[0];
        if (file) this.processFile(file);
    }

    async processFile(file) {
        const typingMessage = this.addMessage('', false, true);
        this.addMessage(`📄 Uploaded: ${file.name}`, true);

        setTimeout(async () => {
            typingMessage.remove();
            let extractedText = '';
            try {
                extractedText = await this.extractTextFromFile(file);
            } catch (err) {
                this.addMessage("❌ Failed to extract text from file. Try a different file or format.");
                return;
            }
            if (!this.isBloodReport(extractedText)) {
                this.addMessage("❌ The uploaded file does NOT look like a blood/hemoglobin report.<br>Please upload a valid blood report with hemoglobin data.");
                return;
            }
            // Continue with analysis.
            this.addMessage(`<strong>File detected as Blood/Hemoglobin Report.</strong><br>Ready to analyze further...`);
            // add any analysis logic here
        }, 2000);
    }

    async extractTextFromFile(file) {
        return new Promise((resolve, reject) => {
            // Text file: Direct text extraction.
            if (file.type === "text/plain") {
                const reader = new FileReader();
                reader.onload = () => resolve(reader.result);
                reader.onerror = reject;
                reader.readAsText(file);
            }
            // PDF file: Use pdf.js
            else if (file.type === "application/pdf") {
                const reader = new FileReader();
                reader.onload = async () => {
                    try {
                        const pdfData = new Uint8Array(reader.result);
                        const loadingTask = window.pdfjsLib.getDocument({ data: pdfData });
                        const pdf = await loadingTask.promise;
                        let text = '';
                        for (let i = 1; i <= pdf.numPages; i++) {
                            const page = await pdf.getPage(i);
                            const content = await page.getTextContent();
                            const strings = content.items.map(item => item.str);
                            text += strings.join(' ') + '\n';
                        }
                        resolve(text);
                    } catch (err) {
                        reject(err);
                    }
                };
                reader.onerror = reject;
                reader.readAsArrayBuffer(file);
            }
            // JPG/PNG image: Use Tesseract.js OCR
            else if (
                file.type === "image/jpeg" ||
                file.type === "image/png" ||
                file.type === "image/jpg"
            ) {
                const reader = new FileReader();
                reader.onload = async () => {
                    try {
                        const { data: { text } } = await Tesseract.recognize(reader.result, 'eng', {
                            logger: m => {
                                // Optionally: Progress in console
                                // console.log(m);
                            }
                        });
                        resolve(text);
                    } catch (err) {
                        reject(err);
                    }
                };
                reader.onerror = reject;
                reader.readAsDataURL(file);
            }
            else {
                // Not a supported format.
                resolve("");
            }
        });
    }

    isBloodReport(text) {
        // Accept report if mentions "blood", "hemoglobin", or "report"
        if (!text || typeof text !== "string") return false;
        const keywords = [/hemoglobin/i, /blood/i, /report/i];
        return keywords.some(regex => regex.test(text));
    }
}

document.addEventListener('DOMContentLoaded', function() {
    new HemoglobinChatbot();
});
