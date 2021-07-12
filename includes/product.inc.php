<?php
    session_start();

    //if the view button was clicked
    if(isset($_GET['product_button'])){
        //Check for values and direct user to correct product page
        switch($_GET['product_button']){
            case '1':
                $_SESSION['productID'] = $_GET['product_button'];
                header('Location: ../product.php?item=hidden-fates-tin-charizard-gx');
                exit();
                break;
            case '2':
                $_SESSION['productID'] = $_GET['product_button'];
                header('Location: ../product.php?item=hidden-fates-tin-gyarados-gx');
                exit();
                break;
            case '3':
                $_SESSION['productID'] = $_GET['product_button'];
                header('Location: ../product.php?item=hidden-fates-tin-raichu-gx');
                exit();
                break;
            case '4':
                $_SESSION['productID'] = $_GET['product_button'];
                header('Location: ../product.php?item=hidden-fates-elite-trainer-box');
                exit();
                break;
            case '5':
                $_SESSION['productID'] = $_GET['product_button'];
                header('Location: ../product.php?item=hidden-fates-collection-box-charizard-gx');
                exit();
                break;
            case '6':
                $_SESSION['productID'] = $_GET['product_button'];
                header('Location: ../product.php?item=hidden-fates-collection-box-gyarados-gx');
                exit();
                break;
            case '7':
                $_SESSION['productID'] = $_GET['product_button'];
                header('Location: ../product.php?item=hidden-fates-collection-box-raichu-gx');
                exit();
                break;
            case '8':
                $_SESSION['productID'] = $_GET['product_button'];
                header('Location: ../product.php?item=shining-fates-elite-trainer-box');
                exit();
                break;
            case '9':
                $_SESSION['productID'] = $_GET['product_button'];
                header('Location: ../product.php?item=shining-fates-tin-cramorant-v');
                exit();
                break;
            case '10':
                $_SESSION['productID'] = $_GET['product_button'];
                header('Location: ../product.php?item=shining-fates-tin-boltund-v');
                exit();
                break;
            case '11':
                $_SESSION['productID'] = $_GET['product_button'];
                header('Location: ../product.php?item=shining-fates-tin-eldegoss-v');
                exit();
                break;
            case '12':
                $_SESSION['productID'] = $_GET['product_button'];
                header('Location: ../product.php?item=shining-fates-mad-party-pin-collection-dedenne');
                exit();
                break;
            case '13':
                $_SESSION['productID'] = $_GET['product_button'];
                header('Location: ../product.php?item=shining-fates-mad-party-pin-collection-polteageist');
                exit();
                break;
            case '14':
                $_SESSION['productID'] = $_GET['product_button'];
                header('Location: ../product.php?item=shining-fates-mad-party-pin-collection-galarian-mr-rime');
                exit();
                break;
            case '15':
                $_SESSION['productID'] = $_GET['product_button'];
                header('Location: ../product.php?item=shining-fates-premium-collection-shiny-crobat');
                exit();
                break;
            case '16':
                $_SESSION['productID'] = $_GET['product_button'];
                header('Location: ../product.php?item=shining-fates-premium-collection-shiny-dragapult');
                exit();
                break;
            case '17':
                $_SESSION['productID'] = $_GET['product_button'];
                header('Location: ../product.php?item=battle-styles-elite-trainer-box-rapid-strike');
                exit();
                break;
            case '18':
                $_SESSION['productID'] = $_GET['product_button'];
                header('Location: ../product.php?item=battle-styles-elite-trainer-box-single-strike');
                exit();
                break;
            case '19':
                $_SESSION['productID'] = $_GET['product_button'];
                header('Location: ../product.php?item=rapid-strike-urshifu-v-box');
                exit();
                break;
            case '20':
                $_SESSION['productID'] = $_GET['product_button'];
                header('Location: ../product.php?item=single-strike-urshifu-v-box');
                exit();
                break;
            case '21':
                $_SESSION['productID'] = $_GET['product_button'];
                header('Location: ../product.php?item=ghosts-from-the-past');
                exit();
                break;
            case '22':
                $_SESSION['productID'] = $_GET['product_button'];
                header('Location: ../product.php?item=ancient-guardians-booster-box');
                exit();
                break;
            case '23':
                $_SESSION['productID'] = $_GET['product_button'];
                header('Location: ../product.php?item=lightning-overdrive-booster-box');
                exit();
            case '24':
                $_SESSION['productID'] = $_GET['product_button'];
                header('Location: ../product.php?item=blazing-vortex-booster-box');
                exit();
            case '25':
                $_SESSION['productID'] = $_GET['product_button'];
                header('Location: ../product.php?item=structure-deck-freezing-chains');
                exit();
            case '26':
                $_SESSION['productID'] = $_GET['product_button'];
                header('Location: ../product.php?item=genesis-impact-booster-box');
                exit();
            case '27':
                $_SESSION['productID'] = $_GET['product_button'];
                header('Location: ../product.php?item=genesis-impact-booster-box');
                exit();   
            case '28':
                $_SESSION['productID'] = $_GET['product_button'];
                header('Location: ../product.php?item=ultra-pro-super-thick-toploader');
                exit(); 
            case '29':
                $_SESSION['productID'] = $_GET['product_button'];
                header('Location: ../product.php?item=ultra-pro-regular-toploader');
                exit(); 
            case '30':
                $_SESSION['productID'] = $_GET['product_button'];
                header('Location: ../product.php?item=ultra-pro-regular-toploader-and-card-sleeves');
                exit();  
            case '31':
                $_SESSION['productID'] = $_GET['product_button'];
                header('Location: ../product.php?item=bcw-topload-card-holder');
                exit(); 
            case '32':
                $_SESSION['productID'] = $_GET['product_button'];
                header('Location: ../product.php?item=100pc-clear-card-sleeves');
                exit(); 
            case '33':
                $_SESSION['productID'] = $_GET['product_button'];
                header('Location: ../product.php?item=eclipse-deck-protector-sleeves');
                exit(); 
            case '34':
                $_SESSION['productID'] = $_GET['product_button'];
                header('Location: ../product.php?item=titan-shield-card-protection-sleeves');
                exit();
            case '35':
                $_SESSION['productID'] = $_GET['product_button'];
                header('Location: ../product.php?item=pirate-lab-black-slice-box');
                exit();
            case '36':
                $_SESSION['productID'] = $_GET['product_button'];
                header('Location: ../product.php?item=vault-x-premium-exotec-deck-box');
                exit();
            case '37':
                $_SESSION['productID'] = $_GET['product_button'];
                header('Location: ../product.php?item=monsters-protectors-double-deck-box');
                exit();
            case '38':
                $_SESSION['productID'] = $_GET['product_button'];
                header('Location: ../product.php?item=strixhaven-school-of-mages');
                exit();
            case '39':
                $_SESSION['productID'] = $_GET['product_button'];
                header('Location: ../product.php?item=modern-horizons-2');
                exit();
            case '40':
                $_SESSION['productID'] = $_GET['product_button'];
                header('Location: ../product.php?item=time-spiral-remastered');
                exit();
            case '41':
                $_SESSION['productID'] = $_GET['product_button'];
                header('Location: ../product.php?item=kaldheim');
                exit();
            case '42':
                $_SESSION['productID'] = $_GET['product_button'];
                header('Location: ../product.php?item=2021-bowman-baseball');
                exit();
            case '43':
                $_SESSION['productID'] = $_GET['product_button'];
                header('Location: ../product.php?item=2020-2021-panini-prizm-nba');
                exit(); 
        }
    }
?>
