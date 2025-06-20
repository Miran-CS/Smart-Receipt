const express = require('express');
const bcrypt = require('bcrypt');
const cors = require('cors');
const path = require('path');

const app = express();
const PORT = 3000;

// Middleware
app.use(cors());
app.use(express.json());
app.use(express.static('.'));

// Store hashed password (you should change this to your desired password)
const SALT_ROUNDS = 10;
let hashedPassword = null;

// Initialize password hash on server start
async function initializePassword() {
    const plainPassword = "558858"; // Your password
    hashedPassword = await bcrypt.hash(plainPassword, SALT_ROUNDS);
    console.log("Password hash initialized");
}

// Login endpoint
app.post('/api/login', async (req, res) => {
    try {
        const { username, password } = req.body;
        
        // Check username
        if (username !== "MiranCS") {
            return res.status(401).json({ 
                success: false, 
                message: "هەڵەیە. دووبارە هەوڵ بدە!" 
            });
        }
        
        // Check password
        const isPasswordValid = await bcrypt.compare(password, hashedPassword);
        
        if (isPasswordValid) {
            res.json({ 
                success: true, 
                message: "Login successful" 
            });
        } else {
            res.status(401).json({ 
                success: false, 
                message: "هەڵەیە. دووبارە هەوڵ بدە!" 
            });
        }
    } catch (error) {
        console.error('Login error:', error);
        res.status(500).json({ 
            success: false, 
            message: "Server error" 
        });
    }
});

// Serve the main HTML file
app.get('/', (req, res) => {
    res.sendFile(path.join(__dirname, 'index.html'));
});

// Start server
app.listen(PORT, async () => {
    await initializePassword();
    console.log(`Server running on http://localhost:${PORT}`);
    console.log('Password authentication is now handled securely on the backend!');
});