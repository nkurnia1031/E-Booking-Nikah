<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="./mine/bootstrap.min.css">
    <link rel="stylesheet" href="./mine/animate.min.css" />
    <link rel="stylesheet" href="./mine/simplebar.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Parisienne&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://csshake.surge.sh/csshake.min.css">
    <title>
        <?php echo $data['judul']; ?>
    </title>
    <style type="text/css">
       .zoom:hover {
        border-color: #fb142f;
  transform: scale(1.05); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
}
    .bg-1 {
        background: #3494E6;
        /* fallback for old browsers */
        background: -webkit-linear-gradient(to right, #EC6EAD, #3494E6);
        /* Chrome 10-25, Safari 5.1-6 */
        background: linear-gradient(to right, #EC6EAD, #3494E6);
        /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

    }

    .bg-full {
        background: url(./mine/bg1.png) no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }

    .atas {
        position: relative;
        z-index: 2;
    }

    .con-blur {
        position: relative;
        overflow: hidden;
    }


    .blur {
        object-fit: cover;
        font-family: 'object-fit: cover;';
        position: absolute;
        top: 0;
        z-index: 1;
        width: 100%;
        height: 100%;
        -webkit-filter: blur(8px);
        filter: blur(8px);
    }

    .card {
        border-color: #ffdde1;
    }

    .dropdown-item.active,
    .dropdown-item:active {
        color: #000;
        text-decoration: none;
        background-color: #ffdde1;
    }

    .bg-4 {
        background: rgb(255, 221, 225);
        background: radial-gradient(circle, rgba(255, 221, 225, 1) 0%, rgba(246, 247, 249, 1) 100%);
        /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

    }


    .bg-2 {
        background: #3494E6;
        /* fallback for old browsers */
        background: -webkit-linear-gradient(to right, #EC6EAD, #3494E6);
        /* Chrome 10-25, Safari 5.1-6 */
        background: linear-gradient(to right, rgba(236, 110, 173, 0.59), #3494e68f)
            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

    }

    .btn-outline-1 {
        color: #00abc9;
        border-color: #00abc9;
    }

    .btn-outline-1:hover {
        background: #00abc9;

    }

    .btn-outline-1.active {
        color: black;

        background: #00abc9;

    }


    .btn-outline-2 {
        color: #f0988b;
        border-color: #f0988b;
    }

    .btn-outline-2:hover {
        background: #f0988b;

    }

    .btn-outline-2.active {
        color: black;

        background: #f0988b;

    }

    .table {
        zoom: 80%;
    }
    </style>
</head>