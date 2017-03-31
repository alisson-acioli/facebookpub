<?php
$version_success = false;
$timezone_success = false;
$curl_success = false;
$mysql_success = false;


$version_required = "5.4.0";
$version_current = PHP_VERSION;

if (version_compare($version_current, $version_required) >= 0) {
    $version_success = true;
}

if (function_exists("mysqli_connect")) {
    $mysql_success = true;
}

if (function_exists("curl_version")) {
    $curl_success = true;
}

$timezone_settings = ini_get('date.timezone');
if ($timezone_settings) {
    $timezone_success = true;
}

if ($version_success && $timezone_success && $curl_success && $mysql_success) {
    $all_requirement_success = true;
} else {
    $all_requirement_success = false;
}

$dashboard_url = $_SERVER['HTTP_HOST'] . $_SERVER['SCRIPT_NAME'];
$dashboard_url = preg_replace('/install.*/', '', $dashboard_url); //remove everything after index.php
if (!empty($_SERVER['HTTPS'])) {
    $dashboard_url = 'https://' . $dashboard_url;
} else {
    $dashboard_url = 'http://' . $dashboard_url;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>FacebookPub - Install</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    
    <link rel='stylesheet' type='text/css' href='assets/js/font-awesome/css/font-awesome.min.css' />
    
    <link rel='stylesheet' type='text/css' href='assets/css/style.css' />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">FacebookPub - Installation</a>
        </div>
      </div>
    </nav>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1>Hello!</h1>
        <p>Thank you for purchasing the FacebookPub script. Here you can install this amazing system!</p>
      </div>
    </div>

    <div class="container">

      <div class="install-box">

            <div class="panel panel-install">
                <div class="panel-heading text-center">                    
                    <h2> FacebookPub Installation</h2>
                </div>
                <div class="panel-body no-padding">
                    <div class="tab-container clearfix">
                        <div id="pre-installation" class="tab-title col-sm-4 active"><i class="fa fa-circle-o"></i><strong> Pre-Installation</strong></span></div>
                        <div id="configuration" class="tab-title col-sm-4"><i class="fa fa-circle-o"></i><strong> Configuration</strong></div>
                        <div id="finished" class="tab-title col-sm-4"><i class="fa fa-circle-o"></i><strong> Finished</strong></div> 
                    </div>
                    <div id="alert-container">

                    </div>


                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="pre-installation-tab">
                            <div class="section">
                                <p>1. Please configure your PHP settings to match following requirements:</p>
                                <hr />
                                <div>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th width="25%">PHP Settings</th>
                                                <th width="27%">Current Version</th>
                                                <th>Required Version</th>
                                                <th class="text-center">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>PHP Version</td>
                                                <td><?php echo $version_current; ?></td>
                                                <td><?php echo $version_required; ?>+</td>
                                                <td class="text-center">
                                                    <?php if ($version_success) { ?>
                                                        <i class="status fa fa-check-circle-o"></i>
                                                    <?php } else { ?>
                                                        <i class="status fa fa-times-circle-o"></i>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="section">
                                <p>2. Please make sure the extensions/settings listed below are installed/enabled:</p>
                                <hr />
                                <div>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th width="25%">Extension</th>
                                                <th width="27%">Current Settings</th>
                                                <th>Required Settings</th>
                                                <th class="text-center">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>MySQLi</td>
                                                <td> <?php if ($mysql_success) { ?>
                                                        On
                                                    <?php } else { ?>
                                                        Off
                                                    <?php } ?>
                                                </td>
                                                <td>On</td>
                                                <td class="text-center">
                                                    <?php if ($mysql_success) { ?>
                                                        <i class="status fa fa-check-circle-o"></i>
                                                    <?php } else { ?>
                                                        <i class="status fa fa-times-circle-o"></i>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>cURL</td>
                                                <td> <?php if ($curl_success) { ?>
                                                        On
                                                    <?php } else { ?>
                                                        Off
                                                    <?php } ?>
                                                </td>
                                                <td>On</td>
                                                <td class="text-center">
                                                    <?php if ($curl_success) { ?>
                                                        <i class="status fa fa-check-circle-o"></i>
                                                    <?php } else { ?>
                                                        <i class="status fa fa-times-circle-o"></i>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                              <tr>
                                                <td>date.timezone</td>
                                                <td> <?php if ($timezone_success) {
                                                        echo $timezone_settings;
                                                        } else {
                                                            echo "Null";
                                                        } ?>
                                                </td>
                                                <td>Timezone</td>
                                                <td class="text-center">
                                                    <?php if ($timezone_success) { ?>
                                                        <i class="status fa fa-check-circle-o"></i>
                                                    <?php } else { ?>
                                                        <i class="status fa fa-times-circle-o"></i>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="panel-footer">
                                <button <?php
                                if (!$all_requirement_success) {
                                    echo "disabled=disabled";
                                }
                                ?> class="btn btn-info btn-custom btn-block form-next"><i class='fa fa-chevron-right'></i> Next</button>
                            </div>

                        </div>
                        <div role="tabpanel" class="tab-pane" id="configuration-tab">
                            <form name="config-form" id="config-form" action="installation.php" method="post">

                                <div class="section clearfix">
                                    <p>1. Please enter your database connection details.</p>
                                    <hr />
                                    <div>
                                        <div class="form-group clearfix">
                                            <label for="host" class=" col-md-3">Database Host</label>
                                            <div class="col-md-9">
                                                <input type="text" value="" id="host"  name="host" class="form-control" placeholder="Database Host (usually localhost)" />
                                            </div>
                                        </div>
                                        <div class="form-group clearfix">
                                            <label for="dbuser" class=" col-md-3">Database User</label>
                                            <div class=" col-md-9">
                                                <input type="text" value="" name="dbuser" class="form-control" autocomplete="off" placeholder="Database user name" />
                                            </div>
                                        </div>
                                        <div class="form-group clearfix">
                                            <label for="dbpassword" class=" col-md-3">Password</label>
                                            <div class=" col-md-9">
                                                <input type="password" value="" name="dbpassword" class="form-control" autocomplete="off" placeholder="Database user password" />
                                            </div>
                                        </div>
                                        <div class="form-group clearfix">
                                            <label for="dbname" class=" col-md-3">Database Name</label>
                                            <div class=" col-md-9">
                                                <input type="text" value="" name="dbname" class="form-control" placeholder="Database Name" />
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="section clearfix">
                                    <p>2. Please enter your account details for administration.</p>
                                    <hr />
                                    <div>
                                        <div class="form-group clearfix">
                                            <label for="fullname" class=" col-md-3">Your Name</label>
                                            <div class="col-md-9">
                                                <input type="text" value=""  id="fullname"  name="name" class="form-control"  placeholder="Your name" />
                                            </div>
                                        </div>
                                        <div class="form-group clearfix">
                                            <label for="email" class=" col-md-3">Email</label>
                                            <div class=" col-md-9">
                                                <input type="text" value="" name="email" class="form-control" placeholder="Your email" />
                                            </div>
                                        </div>
                                        <div class="form-group clearfix">
                                            <label for="login" class=" col-md-3">Login</label>
                                            <div class="col-md-9">
                                                <input type="text" value=""  id="login"  name="login" class="form-control"  placeholder="Login" />
                                            </div>
                                        </div>
                                        <div class="form-group clearfix">
                                            <label for="password" class=" col-md-3">Password</label>
                                            <div class=" col-md-9">
                                                <input type="password" value="" name="password" class="form-control" placeholder="Login password" />
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="section clearfix">
                                    <p>3. Access facebook application (APP ID and APP Secret)</p>
                                    <hr />
                                    <div>
                                        <div class="form-group clearfix">
                                            <label for="appid" class=" col-md-3">APP ID</label>
                                            <div class="col-md-9">
                                                <input type="text" value=""  id="appid"  name="app_id" class="form-control"  placeholder="App ID" />
                                            </div>
                                        </div>
                                        <div class="form-group clearfix">
                                            <label for="appsecret" class=" col-md-3">APP Secret</label>
                                            <div class=" col-md-9">
                                                <input type="text" value="" id="appsecret" name="app_secret" class="form-control" placeholder="App Secret" />
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="panel-footer">
                                    <button type="submit" class="btn btn-custom btn-block btn-info form-next">
                                        <span class="loader hide"> Please wait...</span>
                                        <span class="button-text"><i class='fa fa-chevron-right'></i> Finish</span> 
                                    </button>
                                </div>

                            </form>
                        </div>

                        <div role="tabpanel" class="tab-pane" id="finished-tab">
                            <div class="section">
                                <div class="clearfix">
                                    <i class="status fa fa-check-circle-o pull-left" style="font-size: 50px"> </i><span class="pull-left"  style="line-height: 50px;">Congratulation! You have successfully installed FacebookPub</span>  
                                </div>

                                <div style="margin: 15px 0 15px 60px; color: #d73b3b;">
                                    Don't forget to delete your installation directory!
                                </div>
                                <a class="go-to-login-page" href="<?php echo $dashboard_url; ?>">
                                    <div class="text-center">
                                        <div style="font-size: 100px;"><i class="fa fa-desktop"></i></div>
                                        <div>GO TO YOUR LOGIN PAGE</div>
                                    </div>
                                </a>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <script type='text/javascript'  src='assets/js/jquery-1.11.3.min.js'></script>
    <script type='text/javascript'  src='assets/js/jquery-validation/jquery.validate.min.js'></script>
    <script type='text/javascript'  src='assets/js/jquery-validation/jquery.form.js'></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <script type="text/javascript">

    var onFormSubmit = function ($form) {
        $form.find('[type="submit"]').attr('disabled', 'disabled').find(".loader").removeClass("hide");
        $form.find('[type="submit"]').find(".button-text").addClass("hide");
        $("#alert-container").html("");
    };
    var onSubmitSussess = function ($form) {
        $form.find('[type="submit"]').removeAttr('disabled').find(".loader").addClass("hide");
        $form.find('[type="submit"]').find(".button-text").removeClass("hide");
    };

    $(document).ready(function () {
        var $preInstallationTab = $("#pre-installation-tab"),
                $configurationTab = $("#configuration-tab");

        $(".form-next").click(function () {
            if ($preInstallationTab.hasClass("active")) {
                $preInstallationTab.removeClass("active");
                $configurationTab.addClass("active");
                $("#pre-installation").find("i").removeClass("fa-circle-o").addClass("fa-check-circle");
                $("#configuration").addClass("active");
                $("#host").focus();
            }
        });

        $("#config-form").submit(function () {
            var $form = $(this);
            onFormSubmit($form);
            $form.ajaxSubmit({
                dataType: "json",
                success: function (result) {
                    onSubmitSussess($form, result);
                    if (result.success) {
                        $configurationTab.removeClass("active");
                        $("#configuration").find("i").removeClass("fa-circle-o").addClass("fa-check-circle");
                        $("#finished").find("i").removeClass("fa-circle-o").addClass("fa-check-circle");
                        $("#finished").addClass("active");
                        $("#finished-tab").addClass("active");
                    } else {
                        $("#alert-container").html('<div class="alert alert-danger" role="alert">' + result.message + '</div>');
                    }
                }
            });
            return false;
        });

    });
</script>
  </body>
</html>
