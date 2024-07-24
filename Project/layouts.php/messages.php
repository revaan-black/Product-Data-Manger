<style>
    @keyframes customSlideIn {
    from {
        right: -300px;
    }
    to {
        right: 20px;
    }
    }

    @keyframes customSlideOut {
    from {
        right: 20px;
    }
    to {
        right: -300px;
    }
    }

    .custom-alert {
    position: fixed;
    top: 50px;
    right: 20px;
    padding: 15px 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    animation: customSlideIn 0.5s forwards;
    color: white;
    }

    .custom-alert-success {
    background-color: #5cb85c;
    }

    .custom-alert-danger {
    background-color: #d9534f;
    }
</style>
<?php
function alert($message, $type) {
    echo "
    <div id='customAlertMessage' class='custom-alert custom-alert-$type' role='alert'>
      $message
    </div>
    <script>
      function hideMessage() {
        var alert = document.getElementById('customAlertMessage');
        alert.style.animation = 'customSlideOut 0.5s forwards';
      }
      setTimeout(hideMessage, 3000);
    </script>
  ";
}

  