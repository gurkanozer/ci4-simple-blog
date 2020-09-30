<?php 
$session = session();
$alert = $session->get('alert');

?>
<?php if (isset($alert)) :?>
    <script>
        Swal.fire({
        'timer' :'<?= $alert['timer']?>',
        'position':'<?= $alert['position']?>',
        'timeProgressBar':'<?= $alert['timeProgressBar']?>',
        'title':'<?= $alert['title']?>',
        'text':'<?= $alert['text']?>',
        'showConfirmButton':'<?= $alert['showConfirmButton'] ?>'
       } )
    </script>
<?php endif ?>