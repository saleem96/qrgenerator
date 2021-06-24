<?php
/**
 * QRcdr - php QR Code generator
 * ajax/create.php
 *
 * PHP version 5.4+
 *
 * @category  PHP
 * @package   QRcdr
 * @author    Nicola Franchini <info@veno.it>
 * @copyright 2015-2020 Nicola Franchini
 * @license   item sold on codecanyon https://codecanyon.net/item/qrcdr-responsive-qr-code-generator/9226839
 * @link      http://veno.es/qrcdr/
 */

if (!isset($_SERVER['HTTP_X_REQUESTED_WITH'])
    || (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) !== 'xmlhttprequest')
) {
    exit;
}

// require dirname(dirname(__FILE__))."/lib/class-qrcdr.php";

require dirname(dirname(__FILE__))."/lib/functions.php";
require dirname(dirname(__FILE__))."/db_connection.php";
$level = filter_input(INPUT_POST, "level", FILTER_SANITIZE_STRING);
$level = $level ? $level : qrcdr()->getConfig('precision');
$optionlogo = filter_input(INPUT_POST, "optionlogo", FILTER_SANITIZE_STRING);
if (in_array($level, array('L','M','Q','H'))) {
    $errorCorrectionLevel = $level;
    if ($optionlogo !== 'none' && $errorCorrectionLevel == 'L') {
        $errorCorrectionLevel = 'M';
    }
}
$size = filter_input(INPUT_POST, "size", FILTER_SANITIZE_STRING);
$size = $size ? $size : 16;
$matrixPointSize = min(max((int)$size, 4), 32);

$outerframe = filter_input(INPUT_POST, "outer_frame", FILTER_SANITIZE_STRING);
$outdir = qrcdr()->getConfig('qrcodes_dir');
$PNG_TEMP_DIR = dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.$outdir.DIRECTORY_SEPARATOR;
$PNG_WEB_DIR = $outdir.'/';
session_start();
$user_id = $_SESSION["user_id"];


$section = $_POST['section'];
$qrcodes_dir = qrcdr()->getConfig('qrcodes_dir');

$created_at=date("Y-m-d");
        $updated_at=date("Y-m-d");
switch ($section)
{
    case '#text':
        // 'created_at' => \Carbon\Carbon::now(),
        // 'updated_at' => \Carbon\Carbon::now()

        // var_dump($created_at);die();
        $data = $_POST['create'];
        $decoded = json_decode($data);
        $basename = filter_var($decoded->basename, FILTER_SANITIZE_STRING);
        $filedir = $qrcodes_dir;
        $filename_path = $basename.'.svg';

        $output_data = filter_input(INPUT_POST, "data", FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
        $output_data = $_POST['data'];

        $conn = new PDO("mysql:host=$servername;dbname=jimitech_qr_generator", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "INSERT INTO qr_details (user_id,section,data,detail,image,status,created_at,updated_at)
                VALUES ($user_id,'text','$output_data','check','$filename_path', 1,'$created_at','$updated_at' )";
             $conn->exec($sql);
        break;

        case '#link':
            $data = $_POST['create'];
            $decoded = json_decode($data);
            $basename = filter_var($decoded->basename, FILTER_SANITIZE_STRING);
            $filedir = $qrcodes_dir;
            $filename_path = $basename.'.svg';

            $link = filter_input(INPUT_POST, 'link', FILTER_SANITIZE_STRING);
            $output_data = $_POST['link'];
            $conn = new PDO("mysql:host=$servername;dbname=jimitech_qr_generator", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "INSERT INTO qr_details (user_id,section,data,detail,image,status,created_at,updated_at)
                VALUES ($user_id,'link','$output_data','check','$filename_path', 1 ,'$created_at','$updated_at')";
             $conn->exec($sql);
            break;

        case '#tel':
            $data = $_POST['create'];
            $decoded = json_decode($data);
            $basename = filter_var($decoded->basename, FILTER_SANITIZE_STRING);
            $filedir = $qrcodes_dir;
            $filename_path = '../'.$filedir.'/'.$basename.'.svg';
        $countrycode = filter_input(INPUT_POST, "countrycodetel", FILTER_SANITIZE_STRING);
        $number = filter_input(INPUT_POST, "tel", FILTER_SANITIZE_STRING);
        if ($number) {
            $countrycode = ($countrycode ? '+'.$countrycode : '');
            $output_data = 'tel:'.$countrycode.$number;
            $arr_tel=[];
            array_push($arr_tel,$output_data);
            // var_dump($arr_tel);die();
            $j_tel=json_encode($arr_tel);
            $conn = new PDO("mysql:host=$servername;dbname=jimitech_qr_generator", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "INSERT INTO qr_details (user_id,section,data,detail,image,status,created_at,updated_at)
                    VALUES ($user_id,'phone','$output_data','$j_tel','$filename_path', 1,'$created_at','$updated_at' )";
                 $conn->exec($sql);


        }
        break;
        case '#sms':
            $data = $_POST['create'];
            $decoded = json_decode($data);
            $basename = filter_var($decoded->basename, FILTER_SANITIZE_STRING);
            $filedir = $qrcodes_dir;
            $filename_path = '../'.$filedir.'/'.$basename.'.svg';
            $countrycode = filter_input(INPUT_POST, "countrycodesms", FILTER_SANITIZE_STRING);

            $number = filter_input(INPUT_POST, "sms", FILTER_SANITIZE_STRING);
            $bodysms = filter_input(INPUT_POST, "bodysms", FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);

            if ($number) {
                $countrycode = ($countrycode ? '+'.$countrycode : '');
                $output_data = $countrycode.$number.':';
                $number=$countrycode.$number;
                if ($bodysms) {
                    $output_data .= $bodysms;
                }
                $arr_tel=[];
            array_push($arr_tel,$output_data);
            // var_dump($arr_tel);die();
            $j_sms=json_encode($arr_tel);
            $conn = new PDO("mysql:host=$servername;dbname=jimitech_qr_generator", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "INSERT INTO qr_details (user_id,section,data,detail,image,status,created_at,updated_at)
                    VALUES ($user_id,'sms','$number','$j_sms','$filename_path', 1,'$created_at','$updated_at' )";
                 $conn->exec($sql);

            }
            break;
            case '#whatsapp':
                $data = $_POST['create'];
            $decoded = json_decode($data);
            $basename = filter_var($decoded->basename, FILTER_SANITIZE_STRING);
            $filedir = $qrcodes_dir;
            $filename_path = '../'.$filedir.'/'.$basename.'.svg';
                $countrycode = filter_input(INPUT_POST, "wapp_countrycode", FILTER_SANITIZE_STRING);

                $number = filter_input(INPUT_POST, "wapp_number", FILTER_SANITIZE_STRING);
                $message = filter_input(INPUT_POST, "wapp_message", FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);

                if ($number) {
                    $output_data = 'https://wa.me/'.$countrycode.$number;
                    $number=$countrycode.$number;
                }

                if ($message) {
                    $output_data .= '/?text='.urlencode($message);
                }
                $arr_tel=[];
                array_push($arr_tel,$output_data);
                // var_dump($arr_tel);die();
                $j_whatsapp=json_encode($arr_tel);
                $conn = new PDO("mysql:host=$servername;dbname=jimitech_qr_generator", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $sql = "INSERT INTO qr_details (user_id,section,data,detail,image,status,created_at,updated_at)
                        VALUES ($user_id,'whatsapp','$number','$j_whatsapp','$filename_path', 1,'$created_at','$updated_at' )";
                     $conn->exec($sql);
                break;
                case '#skype':
                    $data = $_POST['create'];
                    $decoded = json_decode($data);
                    $basename = filter_var($decoded->basename, FILTER_SANITIZE_STRING);
                    $filedir = $qrcodes_dir;
                    $filename_path = '../'.$filedir.'/'.$basename.'.svg';
                    $skype = filter_input(INPUT_POST, "skype", FILTER_SANITIZE_STRING);
                    $skypetype = filter_input(INPUT_POST, "skypeType", FILTER_SANITIZE_STRING);
                    $skypetype = $skypetype ? $skypetype : 'chat';

                    if ($skype) {
                        $output_data = 'skype:'.urlencode($skype).'?'.$skypetype;
                        $name = $skype;
                    }
                    $arr_tel=[];
                array_push($arr_tel,$output_data);

                $j_skype=json_encode($arr_tel);
                $conn = new PDO("mysql:host=$servername;dbname=jimitech_qr_generator", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $sql = "INSERT INTO qr_details (user_id,section,data,detail,image,status,created_at,updated_at)
                        VALUES ($user_id,'skype','$name','$j_skype','$filename_path', 1,'$created_at','$updated_at' )";
                     $conn->exec($sql);
                    break;

                case '#zoom':
                    $data = $_POST['create'];
                    $decoded = json_decode($data);
                    $basename = filter_var($decoded->basename, FILTER_SANITIZE_STRING);
                    $filedir = $qrcodes_dir;
                    $filename_path = '../'.$filedir.'/'.$basename.'.svg';
                    $zoom_id = filter_input(INPUT_POST, "zoom_id", FILTER_SANITIZE_STRING);
                    $zoom_pwd = filter_input(INPUT_POST, "zoom_pwd", FILTER_SANITIZE_STRING);

                    if ($zoom_id && $zoom_pwd) {
                        $zoom_id = str_replace(' ', '', $zoom_id);
                        $output_data = 'https://zoom.us/j/'.$zoom_id.'?pwd='.$zoom_pwd;
                    }
                    $arr_tel=[];
                    array_push($arr_tel,$output_data);
                    // var_dump($arr_tel);die();
                    $j_zoom=json_encode($arr_tel);
                    $conn = new PDO("mysql:host=$servername;dbname=jimitech_qr_generator", $username, $password);
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    $sql = "INSERT INTO qr_details (user_id,section,data,detail,image,status,created_at,updated_at)
                            VALUES ($user_id,'zoom','$zoom_id','$j_zoom','$filename_path',1,'$created_at','$updated_at' )";
                         $conn->exec($sql);
                    break;

                    case '#wifi':
                        $data = $_POST['create'];
                        $decoded = json_decode($data);
                        $basename = filter_var($decoded->basename, FILTER_SANITIZE_STRING);
                        $filedir = $qrcodes_dir;
                        $filename_path = '../'.$filedir.'/'.$basename.'.svg';
                        $ssid = filter_input(INPUT_POST, "ssid", FILTER_SANITIZE_STRING);
                        $wifipass = filter_input(INPUT_POST, "wifipass", FILTER_SANITIZE_STRING);
                        $networktype = filter_input(INPUT_POST, "networktype", FILTER_SANITIZE_STRING);
                        $wifihidden = filter_input(INPUT_POST, "wifihidden", FILTER_SANITIZE_STRING);

                        if ($ssid) {
                            $output_data = 'WIFI:S:'.$ssid.';';
                            $network_name=$ssid;

                            if ($networktype) {
                                $output_data .= 'T:'.$networktype.';';
                            }
                            if ($wifipass) {
                                $output_data .= 'P:'.$wifipass.';';
                            }
                            if ($wifihidden) {
                                $output_data .= 'H:true;';
                            }
                            $output_data .= ';';
                        }
                        $arr_tel=[];
                    array_push($arr_tel,$output_data);
                    // var_dump($arr_tel);die();
                    $j_wifi=json_encode($arr_tel);
                    $conn = new PDO("mysql:host=$servername;dbname=jimitech_qr_generator", $username, $password);
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    $sql = "INSERT INTO qr_details (user_id,section,data,detail,image,status,created_at,updated_at)
                            VALUES ($user_id,'wifi','$network_name','$j_wifi','$filename_path', 1,'$created_at','$updated_at' )";
                         $conn->exec($sql);
                        break;

                        case '#location':
                            $data = $_POST['create'];
                            $decoded = json_decode($data);
                            $basename = filter_var($decoded->basename, FILTER_SANITIZE_STRING);
                            $filedir = $qrcodes_dir;
                            $filename_path = '../'.$filedir.'/'.$basename.'.svg';
                            $lat = filter_input(INPUT_POST, "lat", FILTER_SANITIZE_STRING);
                            $lng = filter_input(INPUT_POST, "lng", FILTER_SANITIZE_STRING);
                            if ($lat && $lng) {
                                $output_data = 'geo:'.$lat.','.$lng.'?q='.$lat.','.$lng;
                                $loc=$lat;
                            }
                            $arr_tel=[];
                            array_push($arr_tel,$output_data);
                            // var_dump($arr_tel);die();
                            $j_location=json_encode($arr_tel);
                            $conn = new PDO("mysql:host=$servername;dbname=qr_code", $username, $password);
                            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                            $sql = "INSERT INTO qr_details (user_id,section,data,detail,image,status,created_at,updated_at)
                                    VALUES ($user_id,'location','$loc','$j_location','$filename_path', 1,'$created_at','$updated_at' )";
                                 $conn->exec($sql);
                            break;
                            case '#vcard':
                                $data = $_POST['create'];
                                $decoded = json_decode($data);
                                $basename = filter_var($decoded->basename, FILTER_SANITIZE_STRING);
                                $filedir = $qrcodes_dir;
                                $filename_path = '../'.$filedir.'/'.$basename.'.svg';
                                $vversion     = filter_input(INPUT_POST, "vversion", FILTER_SANITIZE_STRING);
                                $vnametitle = filter_input(INPUT_POST, "vnametitle", FILTER_SANITIZE_STRING);
                                $vname = filter_input(INPUT_POST, "vname", FILTER_SANITIZE_STRING);
                                $vlast = filter_input(INPUT_POST, "vlast", FILTER_SANITIZE_STRING);
                                $sortName     = $vlast.';'.$vname;
                                $sortName     = $vnametitle ? $sortName.';;'.$vnametitle : $sortName;
                                if ($vversion !== '2.1') {
                                    $sortName .= ';';
                                }
                                $fn           = $vname.' '.$vlast;
                                $fn           = $vnametitle ? $sortName.' '.$fn : $fn;
                                $countryphone = filter_input(INPUT_POST, "countrycodevphone", FILTER_SANITIZE_STRING);
                                $countryphone = ($countryphone ? '+'.$countryphone : '');
                                $phone        = filter_input(INPUT_POST, "vphone", FILTER_SANITIZE_STRING);

                                $countrymobile = filter_input(INPUT_POST, "countrycodevmobile", FILTER_SANITIZE_STRING);
                                $countrymobile = ($countrymobile ? '+'.$countrymobile : '');
                                $phoneCell    = filter_input(INPUT_POST, "vmobile", FILTER_SANITIZE_STRING);

                                $email        = filter_input(INPUT_POST, "vemail", FILTER_VALIDATE_EMAIL);
                                $orgName      = filter_input(INPUT_POST, "vcompany", FILTER_SANITIZE_STRING);
                                $orgTitle     = filter_input(INPUT_POST, "vtitle", FILTER_SANITIZE_STRING);
                                $vurl         = qrcdr()->validateUrl(filter_input(INPUT_POST, "vurl", FILTER_SANITIZE_STRING));

                                $countryoffice = filter_input(INPUT_POST, "countrycodevoffice", FILTER_SANITIZE_STRING);
                                $countryoffice = ($countryoffice ? '+'.$countryoffice : '');
                                $officephone   = filter_input(INPUT_POST, "vofficephone", FILTER_SANITIZE_STRING);

                                $countryfax = filter_input(INPUT_POST, "countrycodevfax", FILTER_SANITIZE_STRING);
                                $countryfax = ($countryfax ? '+'.$countryfax : '');
                                $fax        = filter_input(INPUT_POST, "vfax", FILTER_SANITIZE_STRING);

                                $address          = filter_input(INPUT_POST, "vaddress", FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
                                $addressTown      = filter_input(INPUT_POST, "vcity", FILTER_SANITIZE_STRING);
                                $addressPostCode  = filter_input(INPUT_POST, "vcap", FILTER_SANITIZE_STRING);
                                $addressCountry   = filter_input(INPUT_POST, "vcountry", FILTER_SANITIZE_STRING);
                                $addressState     = filter_input(INPUT_POST, "vstate", FILTER_SANITIZE_STRING);

                                // $vnote = filter_input(INPUT_POST, "vnote", FILTER_SANITIZE_STRING);

                                if ($vname) {
                                    $output_data  = 'BEGIN:VCARD'."\n";
                                    $output_data .= 'VERSION:'.$vversion."\n";
                                    $output_data .= 'N;CHARSET=UTF-8:'.$sortName."\n";
                                    $output_data .= 'FN;CHARSET=UTF-8:'.$fn."\n";
                                    $r_name=$vname;
                                    if ($phoneCell) {
                                        if ($vversion == '2.1') {
                                            $output_data .= 'TEL;CELL:'.$countrymobile.$phoneCell."\n";
                                        } else {
                                            $output_data .= 'TEL;TYPE=CELL:'.$countrymobile.$phoneCell."\n";
                                        }
                                    }
                                    if ($phone) {
                                        if ($vversion == '2.1') {
                                            $output_data .= 'TEL;HOME;VOICE:'.$countryphone.$phone."\n";
                                        } else {
                                            $output_data .= 'TEL;TYPE=HOME,VOICE:'.$countryphone.$phone."\n";
                                        }
                                    }
                                    if ($orgName) {
                                        $output_data .= 'ORG;CHARSET=UTF-8:'.$orgName."\n";
                                    }
                                    if ($orgTitle) {
                                        $output_data .= 'TITLE;CHARSET=UTF-8:'.$orgTitle."\n";
                                    }
                                    if ($officephone) {
                                        if ($vversion == '2.1') {
                                            $output_data .= 'TEL;WORK;VOICE:'.$countryoffice.$officephone."\n";
                                        } else {
                                            $output_data .= 'TEL;TYPE=WORK,VOICE:'.$countryoffice.$officephone."\n";
                                        }
                                    }
                                    if ($fax) {
                                        if ($vversion == '2.1') {
                                            $output_data .= 'TEL;WORK;FAX:'.$countryfax.$fax."\n";
                                        } else {
                                            $output_data .= 'TEL;TYPE=FAX,WORK:'.$countryfax.$fax."\n";
                                        }
                                    }

                                    if ($address || $addressTown || $addressState || $addressCountry) {

                                        if ($vversion == '2.1') {
                                            $output_data .= 'ADR;CHARSET=UTF-8;WORK;PREF:;';
                                        } else {
                                            $output_data .= 'ADR;CHARSET=UTF-8;TYPE=WORK,PREF:;';
                                        }
                                        if ($address) {
                                            $address = str_replace(';', '\;', str_replace(',', '\,', $address));
                                            $output_data .= ';'.$address;
                                        }
                                        if ($addressTown) {
                                            $output_data .= ';'.$addressTown;
                                        }
                                        if ($addressState) {
                                            $output_data .= ';'.$addressState;
                                        }
                                        if ($addressPostCode) {
                                            $output_data .= ';'.$addressPostCode;
                                        }
                                        if ($addressCountry) {
                                            $output_data .= ';'.$addressCountry;
                                        }
                                        $output_data .= "\n";
                                    }
                                    if ($email) {
                                        $output_data .= 'EMAIL:'.$email."\n";
                                    }
                                    if ($vurl) {
                                        $output_data .= 'URL:'.$vurl."\n";
                                    }
                                    // if ($vnote) {
                                    //     $output_data .= 'NOTE:'.$vnote."\n";
                                    // }
                                    $output_data .= 'END:VCARD';
                                }
                                $arr_tel=[];
                            array_push($arr_tel,$output_data);
                            // var_dump($arr_tel);die();
                            $j_vcard=json_encode($arr_tel);
                            $conn = new PDO("mysql:host=$servername;dbname=jimitech_qr_generator", $username, $password);
                            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                            $sql = "INSERT INTO qr_details (user_id,section,data,detail,image,status,created_at,updated_at)
                                    VALUES ($user_id,'vcard','$r_name','$j_vcard','$filename_path',1,'$created_at','$updated_at' )";
                                 $conn->exec($sql);
                                break;
                                case '#paypal':
                                    $data = $_POST['create'];
                                $decoded = json_decode($data);
                                $basename = filter_var($decoded->basename, FILTER_SANITIZE_STRING);
                                $filedir = $qrcodes_dir;
                                $filename_path = '../'.$filedir.'/'.$basename.'.svg';
                                    $type = filter_input(INPUT_POST, "pp_type", FILTER_SANITIZE_STRING);
                                    $email = filter_input(INPUT_POST, "pp_email", FILTER_VALIDATE_EMAIL);
                                    $name = filter_input(INPUT_POST, "pp_name", FILTER_SANITIZE_STRING);
                                    $id = filter_input(INPUT_POST, "pp_id", FILTER_SANITIZE_STRING);
                                    $price = filter_input(INPUT_POST, "pp_price", FILTER_SANITIZE_STRING);
                                    $currency = filter_input(INPUT_POST, "pp_currency", FILTER_SANITIZE_STRING);
                                    $shipping = filter_input(INPUT_POST, "pp_shipping", FILTER_SANITIZE_STRING);
                                    $tax = filter_input(INPUT_POST, "pp_tax", FILTER_SANITIZE_STRING);

                                    if ($email && $name) {
                                        $output_data  = 'https://www.paypal.com/cgi-bin/webscr';
                                        $output_data  .= '?cmd='.$type;
                                        $output_data  .= '&business='.urlencode($email);
                                        $output_data  .= '&item_name='.urlencode($name);
                                        $output_data  .= '&amount='.urlencode($price);
                                        $output_data  .= '&currency_code='.$currency;

                                        $res_data  = 'https://www.paypal.com/cgi-bin/webscr';
                                        $res_data  .= '?cmd='.$type;
                                        $res_data  .= '&business='.urlencode($email);
                                        $res_data  .= '&item_name='.urlencode($name);
                                        $res_data  .= '&amount='.urlencode($price);
                                        $res_data  .= '&currency_code='.$currency;

                                        if ($shipping) {
                                            $output_data  .= '&shipping='.urlencode($shipping);
                                        }
                                        if ($tax) {
                                            $output_data  .= '&tax_rate='.urlencode($tax);
                                        }

                                        if ($type === '_xclick') {
                                            $output_data  .= '&button_subtype=services';
                                            $output_data  .= '&bn='.urlencode('PP-BuyNowBF:btn_buynow_LG.gif:NonHostedGuest');
                                        } elseif ($type === '_cart') {
                                            $output_data  .= '&button_subtype=products&add=1';
                                            $output_data  .= '&bn='.urlencode('PP-ShopCartBF:btn_cart_LG.gif:NonHostedGuest');
                                        } else {
                                            $output_data  .= '&bn='.urlencode('PP-DonationsBF:btn_donate_LG.gif:NonHostedGuest');
                                        }
                                        $output_data  .= '&lc=US&no_note=0';
                                    }
                                    $arr_tel=[];
                                    array_push($arr_tel,$output_data);
                                    // var_dump($arr_tel);die();
                                    $j_paypal=json_encode($arr_tel);
                                    $conn = new PDO("mysql:host=$servername;dbname=jimitech_qr_generator", $username, $password);
                                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                                    $sql = "INSERT INTO qr_details (user_id,section,data,detail,image,status,created_at,updated_at)
                                            VALUES ($user_id,'paypal','$res_data','$j_paypal','$filename_path',1,'$created_at','$updated_at' )";
                                         $conn->exec($sql);
                                    break;
                                    case '#bitcoin':
                                        $data = $_POST['create'];
                                        $decoded = json_decode($data);
                                        $basename = filter_var($decoded->basename, FILTER_SANITIZE_STRING);
                                        $filedir = $qrcodes_dir;
                                        $filename_path = '../'.$filedir.'/'.$basename.'.svg';
                                        $btc_account = filter_input(INPUT_POST, "btc_account", FILTER_SANITIZE_STRING);
                                        $btc_amount = filter_input(INPUT_POST, "btc_amount", FILTER_SANITIZE_STRING);
                                        $btc_label = filter_input(INPUT_POST, "btc_label", FILTER_SANITIZE_STRING);
                                        $btc_message = filter_input(INPUT_POST, "btc_message", FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);

                                        if ($btc_account) {
                                            $output_data = 'bitcoin:'.$btc_account;
                                            if ($btc_amount) {
                                                $output_data .= '?amount='.$btc_amount;
                                            }
                                            if ($btc_label) {
                                                $output_data .= '&label='.urlencode($btc_label);
                                                $label=$btc_label;
                                            }
                                            if ($btc_message) {
                                                $output_data .= '&message='.urlencode($btc_message);
                                            }
                                        }
                                        $arr_tel=[];
                                    array_push($arr_tel,$output_data);
                                    // var_dump($arr_tel);die();
                                    $j_bitcoin=json_encode($arr_tel);
                                    $conn = new PDO("mysql:host=$servername;dbname=jimitech_qr_generator", $username, $password);
                                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                                    $sql = "INSERT INTO qr_details (user_id,section,data,detail,image,status,created_at,updated_at)
                                            VALUES ($user_id,'bitcoin','$label','$j_bitcoin','$filename_path',1,'$created_at','$updated_at' )";
                                         $conn->exec($sql);
                                        break;
                                        case '#event':
                                            $data = $_POST['create'];
                                            $decoded = json_decode($data);
                                            $basename = filter_var($decoded->basename, FILTER_SANITIZE_STRING);
                                            $filedir = $qrcodes_dir;
                                            $filename_path = '../'.$filedir.'/'.$basename.'.svg';
                                            $title = filter_input(INPUT_POST, "eventtitle", FILTER_SANITIZE_STRING);
                                            $location = filter_input(INPUT_POST, "eventlocation", FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);

                                            $starttime = filter_input(INPUT_POST, "eventstarttime", FILTER_SANITIZE_STRING);
                                            $endtime = filter_input(INPUT_POST, "eventendtime", FILTER_SANITIZE_STRING);

                                            $reminder = filter_input(INPUT_POST, "eventreminder", FILTER_SANITIZE_STRING);
                                            $eventurl = qrcdr()->validateUrl(filter_input(INPUT_POST, "eventlink", FILTER_SANITIZE_STRING));

                                            $eventnote = filter_input(INPUT_POST, "eventnote", FILTER_SANITIZE_STRING);

                                            if ($title && $starttime) {
                                                $output_data = 'BEGIN:VCALENDAR'."\n";
                                                $output_data .= 'VERSION:2.0'."\n";
                                                $output_data .= 'PRODID:-//QRcdr//QRcdr 4.0//EN'."\n";
                                                $output_data .= 'BEGIN:VEVENT'."\n";
                                                $e_title=$title;
                                                if ($location) {
                                                    $location = str_replace(';', '\;', str_replace(',', '\,', $location));
                                                    $output_data .= 'LOCATION:'.$location."\n";
                                                }
                                                $formatstart = date('Ymd\THis\Z', $starttime);
                                                $output_data .= 'DTSTART:'.$formatstart."\n";

                                                if ($endtime) {
                                                    $formatend = date('Ymd\THis\Z', $endtime);
                                                    $output_data .= 'DTEND:'.$formatend."\n";
                                                }
                                                $output_data .= 'SUMMARY:'.$title."\n";

                                                if ($eventnote) {
                                                    $eventnote = str_replace("\r\n", "\\n", $eventnote);
                                                    $output_data .= 'DESCRIPTION:'.$eventnote."\n";
                                                }
                                                if ($eventurl) {
                                                    $output_data .= 'URL:'.$eventurl."\n";
                                                    $output_data .= 'CLASS:PUBLIC'."\n"; // PUBLIC or PRIVATE
                                                }
                                                if ($reminder) {
                                                    $output_data .= 'BEGIN:VALARM'."\n";
                                                    $output_data .= 'TRIGGER:'.$reminder."\n";
                                                    // $output_data .= 'REPEAT:3'."\n";
                                                    // $output_data .= 'DURATION:PT5M'."\n";
                                                    $output_data .= 'ACTION:DISPLAY'."\n";
                                                    $output_data .= 'DESCRIPTION:Reminder'."\n";
                                                    $output_data .= 'END:VALARM'."\n";
                                                }
                                                $output_data .= 'END:VEVENT'."\n";
                                                $output_data .= 'END:VCALENDAR';
                                            }
                                            $arr_tel=[];
                                            array_push($arr_tel,$output_data);
                                            // var_dump($arr_tel);die();
                                            $j_event=json_encode($arr_tel);
                                            $conn = new PDO("mysql:host=$servername;dbname=jimitech_qr_generator", $username, $password);
                                            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                                            $sql = "INSERT INTO qr_details (user_id,section,data,detail,image,status,created_at,updated_at)
                                                    VALUES ($user_id,'event','$title','$j_event','$filename_path',1,'$created_at','$updated_at' )";
                                                 $conn->exec($sql);
                                            break;

}





$data = $_POST['create'];
require dirname(dirname(__FILE__)).'/lib/functions.php';
$qrcodes_dir = qrcdr()->getConfig('qrcodes_dir');

if ($data) {

    $decoded = json_decode($data);
    $svgheader = '<?xml version="1.0" encoding="utf-8"?><!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">';
    $precontent = $svgheader.$decoded->content;

    if (class_exists('DOMDocument') && class_exists('XSLTProcessor')) {
        $xsl = new DOMDocument;
        $xsl->load('sanitize.xsl');
        $proc = new XSLTProcessor;
        $proc->importStyleSheet($xsl);
        $xml = simplexml_load_string($precontent);
        $content = $proc->transformToXML($xml);
    } else {
        $content = $precontent;
    }

    $basename = filter_var($decoded->basename, FILTER_SANITIZE_STRING);


    if ($content && $basename) {
        $filedir = $qrcodes_dir;
        $filename_path = '../'.$filedir.'/'.$basename.'.svg';
        // var_dump($filename_path);die();
        try {

            $handle = fopen($filename_path, "w");
            fwrite($handle, $content);
            fclose($handle);
        } catch (Exception $e) {
            $response = array('error' => 'Exception: ', $e->getMessage());
            echo json_encode($response);
            exit;
        }
        $response = array(
            'basename' => $basename,
            'filedir' => qrcdr()->relativePath().$qrcodes_dir,
        );
        echo json_encode($response);
    } else {
        $response = array('error' => 'Creation failed');
        echo json_encode($response);
    }
}
exit;
