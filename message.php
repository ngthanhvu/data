<?php
class Message
{
    public $message;
    public $type;

    public function __construct()
    {
        if (isset($_SESSION['message']) && $_SESSION['message']) {
            $this->message = $_SESSION['message']['content'];
            $this->type = $_SESSION['message']['type'];
        }
    }

    public function setMessage($message, $type = 'success')
    {
        $this->message = $message;
        $this->type = $type;
        $_SESSION['message'] = [
            'type' => $this->type,
            'content' => $this->message
        ];
    }

    public function displayMessage()
    {
        if ($this->message) {
            echo "<div class='alert alert-{$this->type}'>{$this->message}</div>";
        }
        unset($_SESSION['message']);
    }
}
