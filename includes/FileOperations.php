<?php
    class UploadSong
    {

        function newupload()
        {
         if($_FILES)   {
             $name=$_FILES['filename']['somename'];
             move_uploaded_file($_FILES['filename']['somename'],$name);

         }

        }

    }

    ?>