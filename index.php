<?php
// The table of correspondence 
$encryptionTable = [
    'A' => 'X', 'B' => 'Y', 'C' => 'Z', 'D' => 'A', 'E' => 'B', 'F' => 'C', 'G' => 'D', 'H' => 'E', 
    'I' => 'F', 'J' => 'G', 'K' => 'H', 'L' => 'I', 'M' => 'J', 'N' => 'K', 'O' => 'L', 'P' => 'M', 
    'Q' => 'N', 'R' => 'O', 'S' => 'P', 'T' => 'Q', 'U' => 'R', 'V' => 'S', 'W' => 'T', 'X' => 'U', 
    'Y' => 'V', 'Z' => 'W',
    'a' => 'x', 'b' => 'y', 'c' => 'z', 'd' => 'a', 'e' => 'b', 'f' => 'c', 'g' => 'd', 'h' => 'e', 
    'i' => 'f', 'j' => 'g', 'k' => 'h', 'l' => 'i', 'm' => 'j', 'n' => 'k', 'o' => 'l', 'p' => 'm', 
    'q' => 'n', 'r' => 'o', 's' => 'p', 't' => 'q', 'u' => 'r', 'v' => 's', 'w' => 't', 'x' => 'u', 
    'y' => 'v', 'z' => 'w',
    '0' => '5', '1' => '6', '2' => '7', '3' => '8', '4' => '9', '5' => '0', '6' => '1', '7' => '2', 
    '8' => '3', '9' => '4',
    ' ' => '_', '.' => ',', ',' => '.', '?' => '!', '!' => '?', '-' => '+', '+' => '-', '@' => '#', 
    '#' => '@', '(' => ')', ')' => '('
];

// Create decryption table by flipping the encryption table
$decryptionTable = array_flip($encryptionTable);

// Function to encrypt text
function encrypt($text, $table) {
    $result = '';
    $length = strlen($text);
    
    for ($i = 0; $i < $length; $i++) {
        $char = $text[$i];
        if (isset($table[$char])) {
            $result .= $table[$char];
        } else {
            $result .= $char;
        }
    }
    
    return $result;
}

// Function to decrypt text
function decrypt($text, $table) {
    return encrypt($text, $table);
}

// Form submission
$result = '';
$inputText = '';
$action = 'encrypt';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['input_text'])) {
        $inputText = $_POST['input_text'];
    } else {
        $inputText = '';
    }
    
    if (isset($_POST['action'])) {
        $action = $_POST['action'];
    } else {
        $action = 'encrypt'; // Default action
    }

    
    if ($action === 'encrypt') {
        $result = encrypt($inputText, $encryptionTable);
    } else {
        $result = decrypt($inputText, $decryptionTable);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Text Encryption/Decryption</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <div class="container">
        <h1>Text Encryption/Decryption Tool</h1>
        
        <form method="post" action="">
            <div>
                <label for="input_text">Enter Text:</label>
                <textarea id="input_text" name="input_text" placeholder="Type or paste your text here..."><?php echo htmlspecialchars($inputText); ?></textarea>
            </div>
            
            <div class="radio-group">
                <label>
                    <input type="radio" name="action" value="encrypt" <?php echo $action === 'encrypt' ? 'checked' : ''; ?>>
                    Encrypt
                </label>
                <label>
                    <input type="radio" name="action" value="decrypt" <?php echo $action === 'decrypt' ? 'checked' : ''; ?>>
                    Decrypt
                </label>
            </div>
            
            <div>
                <button type="submit">Process Text</button>
            </div>
        </form>
        
        <?php if (!empty($result)): ?>
        <div class="result">
            <h2>Result:</h2>
            <p><?php echo htmlspecialchars($result); ?></p>
        </div>
        <?php endif; ?>
    </div>
</body>
</html>
