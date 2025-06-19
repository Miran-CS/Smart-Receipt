const express = require('express');
const cors = require('cors');
const app = express();
const PORT = 3000;

// Replace with your real username/password (for demo only)
const USERNAME = 'admin';
const PASSWORD = '1234';

app.use(cors());
app.use(express.json());

app.post('/login', (req, res) => {
  const { username, password } = req.body;
  if (username === USERNAME && password === PASSWORD) {
    res.json({ success: true });
  } else {
    res.json({ success: false, message: 'ناوی بەکارهێنەر یان وشەی نهێنی هەڵەیە!' });
  }
});

app.listen(PORT, () => {
  console.log(`Server running on http://localhost:${PORT}`);
});