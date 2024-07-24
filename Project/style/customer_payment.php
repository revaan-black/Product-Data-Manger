<style>
    .col-lg-5.col-sm-12.my-2 .select2 {
      width: 100%;
      /* default width */
      max-width: 400px;
      /* max-width for large screens */
    }

    @media (max-width: 767px) {
      .col-lg-5.col-sm-12.my-2 .select2 {
        width: 200px;
        /* min-width for small screens */
        max-width: 100%;
        /* unset max-width for small screens */
      }
    }

    @media(max-width: 500px) {
      .table thead {
        display: none;
      }

      .table,
      .table tbody,
      .table tr,
      .table td {
        display: block;
        width: 100%;
      }

      .table tr {
        margin-bottom: 15px;
      }

      .table td {
        text-align: right;
        padding-left: 50%;
        text-align: right;
        position: relative;
      }

      .table td::before {
        content: attr(data-label);
        position: absolute;
        left: 0;
        width: 50%;
        padding-left: 15px;
        font-size: 15px;
        font-weight: bold;
        text-align: left;
      }
    }

    .active-cyan input.form-control[type=text] {
      border-bottom: 1px solid #4dd0e1;
      box-shadow: 0 1px 0 0 #4dd0e1;
    }

    .active-cyan input.form-control[type=text] {
      border-bottom: 1px solid #4dd0e1;
      box-shadow: 0 1px 0 0 #4dd0e1;
    }

    .btn-default {
      background-color: #007bff;
      border: none;
      color: #fff;
      border-radius: 4px;
      padding: 10px 20px;
      transition: all 0.2s ease-in-out;
      box-shadow: 0 2px 2px rgba(0, 0, 0, 0.1);
    }

    .btn-default:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 10px -5px rgba(0, 0, 0, 0.5);
    }
  </style>