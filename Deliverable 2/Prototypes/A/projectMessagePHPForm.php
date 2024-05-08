<?php
    require_once 'functions.php';

    require_once 'above_nav_content.php';

    require_once 'message_returned.php';

    echo <<<_END
    <section class='clearfix container'>
        
        <div class='message-div'>
            $returned_message
        </div>
    </section>

    <footer>
        <div class='end'>
            
        </div>
    </footer>
    </body>
    </html>
    _END;
?>


    





