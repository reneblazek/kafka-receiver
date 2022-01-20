<?php
$services = [];
$services[] = [
    'title' => 'Web projektu',
    'link' => 'http://web.'.$_SERVER['HTTP_HOST'].'/',
    'host' => 'web.'.$_SERVER['HTTP_HOST'],
];
$services[] = [
    'title' => 'Mailhog',
    'link' => 'http://mailhog.'.$_SERVER['HTTP_HOST'].'/',
    'host' => 'mailhog.'.$_SERVER['HTTP_HOST'],
];

$containers = [
    'web',
    'php',
    'mailhog',
    'oracle',
];

?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Symfony DEV prostrednie</title>
</head>


<body>

<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
    <h5 class="my-0 mr-md-auto font-weight-normal">Symfony DEV prostrednie</h5>
</div>

<div class="container">
    <div class="row">
        <div class="col">
    <h4>Sluzby</h4>
    <?php
    foreach($services as $service) {
        ?>
        <div class="row">
            <div class="col-sm pt-3">
                <h6><?php echo $service['title']; ?></h6>
                <a href="<?php echo $service['link']; ?>"><?php echo $service['link']; ?></a>
                <?php
                if (isset($service['info']) && $service['info']) {
                    echo '<div class="alert alert-primary" role="alert">'.$service['info'].'</div>';
                }
                ?>
            </div>
        </div>
        <?php
    }
    ?>
        </div>
    </div>
    <br /><br />
    <div class="row">
        <div class="col">
        <h6 class="text-info">tip - ak ti nejdu sluzby horeuvedene sluzby, skus:</h6>
        <div>do suboru /etc/hosts (vo win c:\Windows\System32\Drivers\etc\hosts) pridame tieto riadky:</div>
        <pre>
<?php
foreach($services as $service) {
    echo '127.0.0.1       '.$service['host']."\n";
}
?>
</pre>
        </div>
    </div>
    <?php
    /*
    ?>
    <br /><br />
    <div class="row">
        <div class="col">
            <h4>Technické info</h4>
            <h5>Zoznam kontainerov</h5>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Kontainer</th>
                    <th scope="col">IP adresa v docker sieti</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach($containers as $container) {
                    $ip = gethostbyname($container);
                    if ($container == $ip) {
                        continue;
                    }
                ?>
                    <tr>
                        <th scope="row"><?php echo $container; ?></th>
                        <td><?php echo $ip; ?></td>
                    </tr>
                <?php
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php
    */
    ?>
</div>

