<?php
    include_once '../../../system/config.php';
    include_once '../../../system/database.php';
    include_once '../../../lib/myfunctions.php';
    include_once '../../models/user.php';
    $model = new Model_user();
    $lib = new lib();
    if ($_POST['Action'])
    {
        switch ($_POST['Action']) {
            case 'CheckExist': //check tài khoản có tồn tại không
                $Return = array(); //khởi tạo array mới
                 $Return['StatusCode'] = (int)((is_array($model->IsExist ($_POST['Login']))) ? 0 : 1);
                echo json_encode($Return);
                return;
                break;
            case 'Login':
                $Return = array();

                $Return['StatusCode'] = (int)((($model->checkUser($_POST['Login'],$_POST['Password'],$_POST['Remember']))=== true) ? 0 : 1);

                echo json_encode($Return);
                return;
            case 'CheckEmailNamePhoneExist':
                $Return = array();
                if(is_array($model->IsExist ($_POST['Login']))){
                    $Return['StatusCode'] =1;
                }elseif(is_array($model->checkEmailTonTai($_POST['email']))){
                    $Return['StatusCode'] =2;
                }else{
                    $Return['StatusCode'] =0;
                }
                echo json_encode($Return);
                return;
                break;
            case 'signup':
                $Return = array();
                $userName = trim($lib->stripTags($_POST['username']));
                $email = trim($lib->stripTags($_POST['email']));
                $passWord = trim($lib->stripTags($_POST['password']));

                $randomKey = md5(rand(0,99999));
                $active = 0;
                
                
                $Return['StatusCode']  = (int)$model->addUser($userName,$passWord,$active,$email,$randomKey) ? 1 : 0;
                echo json_encode($Return);

                $gansi = $model->checkUserSignup($userName,$passWord);
                $idUser = $gansi['id'];
               
                return;
            break;
            case 'Token':
                {
                    $_SESSION['RequestUser'] = $_POST['Login'];
                    $_SESSION['Token'] = $lib -> TokenCreator(6);

                    $model->sendMailResetPass($_POST['Login']);

                    $Return = array();
        
                    $Return['StatusCode'] = 1;
        
                    echo json_encode($Return);
                    return;
                }
                break;
            case 'Reset':
                {
                    $Status = $model -> DoReset($_POST['ResetCode'], $_POST['NewPass']);
        
                    $Return = array();
        
                    if ($Status == NULL) $Return['StatusCode'] = 2;
                    else $Return['StatusCode'] = ($Status) ? 1 : 0;
        
                    echo json_encode($Return);
        
                    if ($Status == NULL) return;
        
                    unset($_SESSION['Token']);
                    unset($_SESSION['RequestUser']);
                } 
                break;
            case 'ChangePass':
                {
                    $Status = $model -> ChangePass($_POST['NewPass'],$_POST['OldPass']);
        
                    $Return = array();
        
                    if ($Status == NULL) $Return['StatusCode'] = 2;
                    else $Return['StatusCode'] = ($Status) ? 1 : 0;
        
                    echo json_encode($Return);
        
                    if ($Status == NULL) return;
                } 
                break;
            default:
                # code...
                break;
        }
    }

?>