<html>
<head>
    <title>Mufti Azure Cloud</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <link rel="icon" href="uploads/logo.jpg">
    <style type="text/css">
        body {
            margin: 0;
            padding: 0;
            
        }
        h1 {
            color : #000000;
            text-align : center;
            font-family: "SIMPSON";
        }
        form {
            /*width: 300px;*/
            margin: 0 auto;
        }
    </style>
</head>

<body style="margin-left: 30px;">
<script type="text/javascript">
    function processImage() {
        try {
            // **********************************************
            // *** Update or verify the following values. ***
            // **********************************************
     
            // Replace <Subscription Key> with your valid subscription key.
            var subscriptionKey = "24dd32f43e34404f9be7c9c9d5ef7ca6";
     
            // You must use the same Azure region in your REST API method as you used to
            // get your subscription keys. For example, if you got your subscription keys
            // from the West US region, replace "westcentralus" in the URL
            // below with "westus".
            //
            // Free trial subscription keys are generated in the "westus" region.
            // If you use a free trial subscription key, you shouldn't need to change
            // this region.
            var uriBase =
                "https://southeastasia.api.cognitive.microsoft.com/vision/v2.0/analyze";
     
            // Request parameters.
            var params = {
                "visualFeatures": "Categories,Description,Color",
                "details": "",
                "language": "en",
            };
     
            // Display the image.
            var sourceImageUrl = document.getElementById("inputImage").value;
            // var sourceImageUrl = imgUrlFile;
            document.querySelector("#sourceImage").src = sourceImageUrl;
     
            // Make the REST API call.
            $.ajax({
                url: uriBase + "?" + $.param(params),
     
                // Request headers.
                beforeSend: function(xhrObj){
                    xhrObj.setRequestHeader("Content-Type","application/json");
                    xhrObj.setRequestHeader(
                        "Ocp-Apim-Subscription-Key", subscriptionKey);
                },
     
                type: "POST",
     
                // Request body.
                data: '{"url": ' + '"' + sourceImageUrl + '"}',
            })
     
            .done(function(data) {
                // Show formatted JSON on webpage.
                $("#responseTextArea").val(JSON.stringify(data, null, 2));
            })
     
            .fail(function(jqXHR, textStatus, errorThrown) {
                // Display error message.
                var errorString = (errorThrown === "") ? "Error. " :
                    errorThrown + " (" + jqXHR.status + "): ";
                errorString += (jqXHR.responseText === "") ? "" :
                    jQuery.parseJSON(jqXHR.responseText).message;
                alert(errorString);
            });  
        }
        catch(err) {
          document.getElementById("demo").innerHTML = err.message;
        }     
    };
    function processImage(imgUrlFile) {
        try {
            // **********************************************
            // *** Update or verify the following values. ***
            // **********************************************
     
            // Replace <Subscription Key> with your valid subscription key.
            var subscriptionKey = "24dd32f43e34404f9be7c9c9d5ef7ca6";
     
            // You must use the same Azure region in your REST API method as you used to
            // get your subscription keys. For example, if you got your subscription keys
            // from the West US region, replace "westcentralus" in the URL
            // below with "westus".
            //
            // Free trial subscription keys are generated in the "westus" region.
            // If you use a free trial subscription key, you shouldn't need to change
            // this region.
            var uriBase =
                "https://southeastasia.api.cognitive.microsoft.com/vision/v2.0/analyze";
     
            // Request parameters.
            var params = {
                "visualFeatures": "Categories,Description,Color",
                "details": "",
                "language": "en",
            };
     
            // Display the image.
            var sourceImageUrl = document.getElementById("urlblob"+imgUrlFile).value;
            document.querySelector("#sourceImage").src = sourceImageUrl;
     
            // Make the REST API call.
            $.ajax({
                url: uriBase + "?" + $.param(params),
     
                // Request headers.
                beforeSend: function(xhrObj){
                    xhrObj.setRequestHeader("Content-Type","application/json");
                    xhrObj.setRequestHeader(
                        "Ocp-Apim-Subscription-Key", subscriptionKey);
                },
     
                type: "POST",
     
                // Request body.
                data: '{"url": ' + '"' + sourceImageUrl + '"}',
            })
     
            .done(function(data) {
                // Show formatted JSON on webpage.
                $("#responseTextArea").val(JSON.stringify(data, null, 2));
            })
     
            .fail(function(jqXHR, textStatus, errorThrown) {
                // Display error message.
                var errorString = (errorThrown === "") ? "Error. " :
                    errorThrown + " (" + jqXHR.status + "): ";
                errorString += (jqXHR.responseText === "") ? "" :
                    jQuery.parseJSON(jqXHR.responseText).message;
                alert(errorString);
            });  
        }
        catch(err) {
          document.getElementById("demo").innerHTML = err.message;
        }     
    };
</script>
<p id="demo"></p>
    <h1>Website Analisa Gambar</h1>
    <p align="center">by Mufti Alie Satriawan</p>

    <h2>Masukkan file gambarmu yang akan di analisa</h2>

    <form method="post" action="index.php" enctype="multipart/form-data">
        <table cellpadding="10px">
            <tr>
                <td>Upload File : </td>
                <td><input name="uploadfile" type="file" accept="image/*" /></td>
            </tr>    
            <tr>
                <td colspan="1" align="center"><input name="upload" type="submit" value="Upload Image" /></td>
            </tr>
        </table>
    </form>



<?php 
/**----------------------------------------------------------------------------------
* Microsoft Developer & Platform Evangelism
*
* Copyright (c) Microsoft Corporation. All rights reserved.
*
* THIS CODE AND INFORMATION ARE PROVIDED "AS IS" WITHOUT WARRANTY OF ANY KIND, 
* EITHER EXPRESSED OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE IMPLIED WARRANTIES 
* OF MERCHANTABILITY AND/OR FITNESS FOR A PARTICULAR PURPOSE.
*----------------------------------------------------------------------------------
* The example companies, organizations, products, domain names,
* e-mail addresses, logos, people, places, and events depicted
* herein are fictitious.  No association with any real company,
* organization, product, domain name, email address, logo, person,
* places, or events is intended or should be inferred.
*----------------------------------------------------------------------------------
**/

/** -------------------------------------------------------------
# Azure Storage Blob Sample - Demonstrate how to use the Blob Storage service. 
# Blob storage stores unstructured data such as text, binary data, documents or media files. 
# Blobs can be accessed from anywhere in the world via HTTP or HTTPS. 
#
# Documentation References: 
#  - Associated Article - https://docs.microsoft.com/en-us/azure/storage/blobs/storage-quickstart-blobs-php 
#  - What is a Storage Account - http://azure.microsoft.com/en-us/documentation/articles/storage-whatis-account/ 
#  - Getting Started with Blobs - https://azure.microsoft.com/en-us/documentation/articles/storage-php-how-to-use-blobs/
#  - Blob Service Concepts - http://msdn.microsoft.com/en-us/library/dd179376.aspx 
#  - Blob Service REST API - http://msdn.microsoft.com/en-us/library/dd135733.aspx 
#  - Blob Service PHP API - https://github.com/Azure/azure-storage-php
#  - Storage Emulator - http://azure.microsoft.com/en-us/documentation/articles/storage-use-emulator/ 
#
**/

require_once 'vendor/autoload.php';
require_once "./random_string.php";

use MicrosoftAzure\Storage\Blob\BlobRestProxy;
use MicrosoftAzure\Storage\Common\Exceptions\ServiceException;
use MicrosoftAzure\Storage\Blob\Models\ListBlobsOptions;
use MicrosoftAzure\Storage\Blob\Models\CreateContainerOptions;
use MicrosoftAzure\Storage\Blob\Models\PublicAccessType;

$connectionString = "DefaultEndpointsProtocol=https;AccountName='muftiwebapp';AccountKey='h9YrSBYCl5An90jxzEGv2GYWPToVHouiw+2u2FCG2TStK0FmETfYf4UufyAlL3W8ek/6RkVNSxeIdcqmSfhgfg=='";

// Create blob client.
$blobClient = BlobRestProxy::createBlobService($connectionString);

$fileToUpload;
$linkurl ="";

// List blobs.
$listBlobsOptions = new ListBlobsOptions();
$containerName = "mufticontainer";?>
<h2>File yang telah diupload</h2>
<table border='1' cellpadding="10px">
    <tr align="center">
        <th>Nama File</th>
        <th>Url File</th>
        <th>Analisis Gambar</th>
    </tr>
<?php
do{
    $result = $blobClient->listBlobs($containerName, $listBlobsOptions);
    if ($result->getBlobs()) {
        $i = 0;
       foreach ($result->getBlobs() as $blob){
            echo '<tr>';
            echo '<td>'.$blob->getName().'</td>';
            echo '<td>'.$blob->getUrl().'<input type="hidden" name="inputImage" id="urlblob'.$i.'" value = "'.$blob->getUrl().'" /></td>';
            // echo '<td align="center"><button onclick="processImage()">Analyze image</button></td>';
            echo '<td align="center"><input name="daftar" type="submit" value="Analyze image" onclick="processImage('.$i.')"/></td>';
            echo '</tr>';
            $i++;
        }
        $listBlobsOptions->setContinuationToken($result->getContinuationToken());
    } else {
        echo '<tr>';
        echo '<td colspan="3">Empty File</td>';
        echo '</tr>';
    }
    
    
} while($result->getContinuationToken());
echo "</table>";

    if(isset($_POST["upload"])){
        $photo= basename($_FILES ['uploadfile']['name']);
        $photo_tmp= $_FILES ['uploadfile']['tmp_name'];
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["uploadfile"]["name"]);
        // if (file_exists($target_file)) {
        //     echo "Sorry, file already exists.";
        //     return;
        // }
        if (move_uploaded_file($photo_tmp, $target_file)) {
            //echo "The file ". $photo. " has been uploaded.";
            //echo '<img src="'.$target_file.'" width="400"/>';
            $fileToUpload = $target_file;
            // Create container options object.
            $createContainerOptions = new CreateContainerOptions();

            // Set public access policy. Possible values are
            // PublicAccessType::CONTAINER_AND_BLOBS and PublicAccessType::BLOBS_ONLY.
            // CONTAINER_AND_BLOBS:
            // Specifies full public read access for container and blob data.
            // proxys can enumerate blobs within the container via anonymous
            // request, but cannot enumerate containers within the storage account.
            //
            // BLOBS_ONLY:
            // Specifies public read access for blobs. Blob data within this
            // container can be read via anonymous request, but container data is not
            // available. proxys cannot enumerate blobs within the container via
            // anonymous request.
            // If this value is not specified in the request, container data is
            // private to the account owner.
            $createContainerOptions->setPublicAccess(PublicAccessType::CONTAINER_AND_BLOBS);

            // Set container metadata.
            $createContainerOptions->addMetaData("key1", "value1");
            $createContainerOptions->addMetaData("key2", "value2");

              //$containerName = "mufticontainer";

            try {
                // Create container.
                //$blobClient->createContainer($containerName, $createContainerOptions);

                // Getting local file so that we can upload it to Azure
                $myfile = fopen($fileToUpload, "r") or die("Unable to open file!");
                fclose($myfile);
                
                # Upload file as a block blob
                // echo "Uploading BlockBlob: ".PHP_EOL;
                // echo $fileToUpload;
                // echo "<br />";
                
                $content = fopen($fileToUpload, "r");

                //Upload blob
                $blobClient->createBlockBlob($containerName, $fileToUpload, $content);

                /*// List blobs.
                $listBlobsOptions = new ListBlobsOptions();

                // echo "These are the blobs present in the container: ";
                do{
                    $result = $blobClient->listBlobs($containerName, $listBlobsOptions);
                    foreach ($result->getBlobs() as $blob){
                        if($blob->getName() == $target_file) {
                            $linkurl = $blob->getUrl();
                            break;
                        }
                    }
                    $listBlobsOptions->setContinuationToken($result->getContinuationToken());
                } while($result->getContinuationToken());*/
                // echo "<br />";

                //echo $linkurl."<br />";
                
                echo '<script>window.alert("File Berhasil di Upload");location.href="index.php";</script>';
                // echo '<br><br>Image to analyze:<button onclick="processImage()">Analyze image</button>';
                
            }
            catch(ServiceException $e){
                // Handle exception based on error codes and messages.
                // Error codes and messages are here:
                // http://msdn.microsoft.com/library/azure/dd179439.aspx
                $code = $e->getCode();
                $error_message = $e->getMessage();
                echo $code.": ".$error_message."<br />";
            }
            catch(InvalidArgumentTypeException $e){
                // Handle exception based on error codes and messages.
                // Error codes and messages are here:
                // http://msdn.microsoft.com/library/azure/dd179439.aspx
                $code = $e->getCode();
                $error_message = $e->getMessage();
                echo $code.": ".$error_message."<br />";
            }
        } else {
            echo "File tidak bisa di upload";
        }
    }


?> 
    <br><br>
    <h2>Hasil Analisis Gambar</h2>
    <div id="wrapper" style="width:1020px; display:table;">
        <div id="jsonOutput" style="width:600px; display:table-cell;  ">
            Response:
            <br><br>
            <textarea id="responseTextArea" class="UIInput"
                      style="width:580px; height:400px;"></textarea>
        </div>
        <div id="imageDiv" style="width:400px; display:table-cell;">
            Source image:
            <br><br>
            <img id="sourceImage" width="400" />
        </div>
    </div>

</body>
</html>