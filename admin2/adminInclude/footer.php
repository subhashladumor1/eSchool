<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="js/jquery-3.3.1.slim.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery-3.3.1.min.js"></script>

<!-- <script src="https://code.jquery.com/jquery-3.5.0.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
</script> -->

<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/r-2.2.3/datatables.min.js"></script>
<script type="text/javascript" src="https://raw.githack.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>

<script type="text/javascript" src="../js/html2pdf.bundle.min.js"></script>

<!-- Moment Js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- <script>
    document.getElementById('pdf-btn').onclick = function() {
        var element = document.getElementById('record_table');

        var opt = {
            margin: 1,
            filename: 'myreport.pdf',
            image: {
                type: 'jpeg',
                quality: 0.98
            },
            html2canvas: {
                scale: 2
            },
            jsPDF: {
                unit: 'in',
                format: 'letter',
                orientation: 'portrait'
            }

        };

        html2pdf(element, opt);
    };
</script> -->

<script>
    function fetch_std() {

        $.ajax({
            url: "fetch_std.php",
            type: "post",
            dataType: "json",
            success: function(data) {
                var stdBody = "";
                for (var key in data) {
                    stdBody += `<option value="${data[key]['course_id']}">${data[key]['course_name']}</option>`;
                }
                $("#select_std").append(stdBody);
                console.log("Fetch_Std Successed!");
            }
        });
    }
    fetch_std();

    // Fetch Result
    console.log("Script Runned");

    function fetch_res() {
        console.log("Fetch_eMAIL");
        $.ajax({
            url: "fetch_res.php",
            type: "post",
            dataType: "json",
            success: function(data) {
                var resBody = "";
                for (var key in data) {
                    resBody += `<option value="${data[key]['stu_email']}">${data[key]['stu_email']}</option>`;
                }
                $("#select_res").append(resBody);
                console.log("Fetch_eMAIL Successed!");
            }
        });
    }
    fetch_res();


    // function fetch(std, res) {
    //     console.log("called fetch");
    //     $.ajax({
    //         url: "records.php",
    //         type: "post",
    //         data: {
    //             std: std,
    //             res: res
    //         },
    //         dataType: "json",
    //         success: function(data) {
    //             var i = 1;
    //             $('#record_table').DataTable({
    //                 "data": data,
    //                 "responsive": true,
    //                 "columns": [{
    //                         "data": "id",
    //                         "render": function(data, type, row, meta) {
    //                             return i++;
    //                         }
    //                     },
    //                     {
    //                         "data": "name"
    //                     },
    //                     {
    //                         "data": "standard",
    //                         "render": function(data, type, row, meta) {
    //                             return `${row.course_id}th Standard`;
    //                         }
    //                     },
    //                     {
    //                         "data": "percentage",
    //                         "render": function(data, type, row, meta) {
    //                             return `${row.stu_email}%`;
    //                         }
    //                     },
    //                     {
    //                         "data": "result"
    //                     },
    //                     {
    //                         "data": "created_at",
    //                         "render": function(data, type, row, meta) {
    //                             return moment(row.created_at).format('DD-MM-YYYY');
    //                         }
    //                     }
    //                 ]

    //             });
    //             console.log("fetch Successfull");
    //         }

    //     });
    // }
    // fetch();

    // Filter

    // $(document).on("click", "#filter", function(e) {
    //     e.preventDefault();

    //     var std = $("#select_std").val();
    //     var res = $("#select_res").val();

    //     if (std !== "" && res !== "") {
    //         $('#record_table').DataTable().destroy();
    //         fetch(std, res);
    //     } else if (std !== "" && res == "") {
    //         $('#record_table').DataTable().destroy();
    //         fetch(std, '');
    //     } else if (std == "" && res !== "") {
    //         $('#record_table').DataTable().destroy();
    //         fetch('', res);
    //     } else {
    //         $('#record_table').DataTable().destroy();
    //         fetch();
    //     }
    // });
</script>






<script type="text/javascript">
    $(document).ready(function() {
        $('#sidebarCollapse').on('click', function() {
            $('#sidebar').toggleClass('active');
            $('#content').toggleClass('active');
        });

        $('.more-button,.body-overlay').on('click', function() {
            $('#sidebar,.body-overlay').toggleClass('show-nav');
        });

    });
</script>