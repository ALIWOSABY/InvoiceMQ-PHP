$(document).ready(function () {
    $("#user_id").on('click', '#active_me', function () {
        // alert("hi Once 144");

        // get the current row
        var currentRow = $(this).closest("tr");

        var col1 = currentRow.find("td:eq(0)").text(); // get current row 1st TD value

        //
        var data = col1;

        // alert(data);

        $.ajax({
            url: "../../Controllers/LoginController.php",
            data: "methode=activeUser&id=" + data,
            success: function (result) {
                //alert(result)
                if (result == "false")

                {
                    // alert(" !!! Error occure While try to change User status");
                    window.location.href = "../Views/Admin/";


                } else if (result == "true")
                {
                    //window.location.href = "../Views/Admin/";
                    //alert("User Acxtive status Change Form 0 to 1 Successfully");
                    $.ajax({
                        url: "../../Controllers/LoginController.php",
                        data: "methode=view_all",
                        success: function (result) {
                            // alert(result);
                            if (result == "ok")

                            {
                                // alert(result);
                                window.location.href = "./?page=page_users_inactive";
                            }

                        }
                    });


                }



            }
        });




    });





    //disactive user

    $("#ActiveUser").on('click', '#dactive_me', function () {
        // alert("hi Once 200");
        // get the current row
        var currentRow = $(this).closest("tr");

        var col1 = currentRow.find("td:eq(0)").text(); // get current row 1st TD value

        var data = col1;

        // alert(data);

        $.ajax({
            url: "../../Controllers/LoginController.php",
            data: "methode=dactiveUser&id=" + data,
            success: function (result) {
                //alert(result)
                if (result == "false")

                {
                    window.location.href = "../Views/Admin/";

                } else if (result == "true")
                {
                    $.ajax({
                        url: "../../Controllers/LoginController.php",
                        data: "methode=view_all",
                        success: function (result) {
                            // alert(result);
                            if (result == "ok")

                            {
                                // alert(result);
                                window.location.href = "../../Views/Admin/page_users_active.php";
                            }

                        }
                    });
                }



            }
        });




    });



    $("#user_id").on('click', '#active_user', function () {
        // alert("hi Once 144");

        // get the current row
        var currentRow = $(this).closest("tr");

        var col1 = currentRow.find("td:eq(0)").text(); // get current row 1st TD value

        //
        var data = col1;

        // alert(data);

        $.ajax({
            url: "../../Controllers/LoginController.php",
            data: "methode=activeUser&id=" + data,
            success: function (result) {
                //alert(result)
                if (result == "false")

                {
                    // alert(" !!! Error occure While try to change User status");
                    window.location.href = "../Views/User/";


                } else if (result == "true")
                {
                    //window.location.href = "../Views/Admin/";
                    //alert("User Acxtive status Change Form 0 to 1 Successfully");
                    $.ajax({
                        url: "../../Controllers/LoginController.php",
                        data: "methode=view_all",
                        success: function (result) {
                            // alert(result);
                            if (result == "ok")

                            {
                                // alert(result);
                                window.location.href = "./?page=page_users_inactive";
                            }

                        }
                    });


                }



            }
        });




    });



   




});
   