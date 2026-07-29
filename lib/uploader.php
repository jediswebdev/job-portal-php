<?php
require 'database.php';

if ( isset( $_POST[ 'submit' ] ) ) {

    if ( !empty( $_FILES[ 'uploader' ] ) ) {

        $name = $_FILES[ 'uploader' ][ 'name' ];
        $targetDir = '../uploads/images/' . date( 'Y-m-d' ). '_' . rand( 10000000, 20000000 ) . '_' . $name;
        $allowedexts = [ 'png', 'jpg', 'jpeg', 'gif' ];

        $fileext = explode( '.', $name );
        $fileext = strtolower( end( $fileext ) );

        if ( in_array( $fileext, $allowedexts ) ) {

            if ( $_FILES[ 'uploader' ][ 'size' ] <= 1000000 ) {

                move_uploaded_file( $_FILES[ 'uploader' ][ 'tmp_name' ], $targetDir );
                echo 'File uploaded sucessfully';
                header( 'Refresh: 3; URL=/crash1' );

            } else {
                echo 'File is too large';
            }
        } else {
            echo 'Invalid file type';
        }
    }

}

?>
