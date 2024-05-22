<?php
    require_once '../src/functions.php';

    session_start();

    require_once '../src/above_nav_content.php';

    require_once '../src/message_returned.php';

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


    





