// $(document).ready(function(event) {
//     // $("branch").searchable();
//     //
//     // const toast = swal.mixin({
//     //     toast: true,
//     //     position: 'top-end',
//     //     showConfirmButton: false,
//     //     timer: 3000
//     // });
//     //
//     // $("#transferForm").validate({
//     //     rules: {
//     //         account_number: {
//     //             required: true,
//     //         },
//     //         confirm_account_number: {
//     //             required: true,
//     //         },
//     //         branch: {
//     //             required :true
//     //         },
//     //         amount:{
//     //             required :true,
//     //         },
//     //     },
//     //     messages: {
//     //         account_number: "Please enter your account name",
//     //         confirm_account_number: "Please enter your product description",
//     //         branch: "Please enter your product category",
//     //         amount: "Please enter your product size",
//     //
//     //     },
//     //     submitHandler: function formSubmit(form) {
//     //         alert("dvav");
//     //         $.ajax({
//     //             url: "ajax/transfer_request.php",
//     //             data: $(form).serialize(),
//     //             type: "post",
//     //             success:function (data) {
//     //                 console.log(data);
//     //                 if(data == 1)
//     //                 {
//     //                 }else
//     //                 {
//     //                     toast({
//     //                         type: 'warning',
//     //                         title: 'Something went wrong. Please try again or contact support!'
//     //                     });
//     //                 }
//     //
//     //             }
//     //         });
//     //     }
//     // });
//
//
// });
//
// $('#transferForm').submit(function(){
//     alert($(this).serialize());
//     $.ajax({
//         url: "ajax/transfer_request.php",
//         data: ($(this)),
//         type: "post",
//         success:function (data) {
//             console.log(data);
//
//         }
//     });
// });
//
// function submitTransferForm(form) {
//     alert("sas");
//     $.ajax({
//         url: "ajax/transfer_request.php",
//         data: $(form).serialize(),
//         type: "post",
//         success:function (data) {
//             console.log(data);
//
//         }
//     });
// }
//
//
// //
// //
// // $(function(){
// //     $('#transferForm').submit(function(){
// //         // alert($(this).serialize());
// //         $.ajax({
// //             url: "ajax/transfer_request.php",
// //             data: ($(this).serialize()),
// //             type: "post",
// //             success:function (data) {
// //                 console.log(data);
// //
// //             }
// //         });
// //     });
// // });
// //
// // function subbmitTransferForm() {
// //     $.ajax({
// //         url: "ajax/transfer_request.php",
// //         data: $(form).serialize(),
// //         type: "post",
// //         success:function (data) {
// //             console.log(data);
// //
// //         }
// //     });
// // }
//
//
// // function fetchTransactions()
// // {
// //     $('#products-table').DataTable( {
// //             "ajax":"ajax/transactions_fetch.php",
// //             "responsive": false,
// //             "scrollX":true,
// //             "language": {
// //                 "loadingRecords": "Loading Transactions..",
// //                 "emptyTable":     "No Transactions Found.."
// //             },
// //
// //             "columnDefs":[
// //                 { "targets": [2,3,5,6,8,9],"orderable": false}
// //             ],
// //             "columns": [
// //                 { "data": 1 },
// //                 { "data": "fromCustomerId" },
// //                 { "data": "toCustomerId" },
// //                 { "data": "Timestamp" },
// //                 { "data": "Amount" }
// //             ]
// //         }
// //     );
// // }
// //
// // fetchTransactions();

//
// <!--                        <li class="panel panel-default" id="dropdown_transactions">-->
// <!--                            <a data-toggle="collapse" href="#dropdown_transactions-lvl1">-->
// <!--                                <span class="glyphicon glyphicon-user"></span> Transactions <span class="caret"></span>-->
// <!--                            </a>-->
// <!---->
// <!--                            <!-- Dropdown level 1 -->-->
// <!--                            <div id="dropdown_transactions-lvl1" class="panel-collapse collapse">-->
//     <!--                                <div class="panel-body">-->
//     <!--                                    <ul class="nav navbar-nav">-->
//     <!--                                        <li><a href="tranfer.php">Transfer</a></li>-->
// <!--                                        <li><a href="ATMtranfer.php">ATM Transfer</a></li>-->
// <!--                                    </ul>-->
// <!--                                </div>-->
// <!--                            </div>-->
// <!--                        </li>-->
//
//
// <!--                        <li><a href="#"><span class="glyphicon glyphicon-cloud"></span> Link</a></li>-->
//
// <!-- Dropdown-->
// <!--                        <li class="panel panel-default" id="dropdown">-->
// <!--                            <a data-toggle="collapse" href="#dropdown-lvl1">-->
// <!--                                <span class="glyphicon glyphicon-user"></span> Sub Level <span class="caret"></span>-->
// <!--                            </a>-->
// <!---->
// <!--                            <!-- Dropdown level 1 -->-->
// <!--                            <div id="dropdown-lvl1" class="panel-collapse collapse">-->
//     <!--                                <div class="panel-body">-->
//     <!--                                    <ul class="nav navbar-nav">-->
//     <!--                                        <li><a href="#">Link</a></li>-->
// <!--                                        <li><a href="#">Link</a></li>-->
// <!--                                        <li><a href="#">Link</a></li>-->
// <!---->
// <!--                                        <!-- Dropdown level 2 -->-->
// <!--                                        <li class="panel panel-default" id="dropdown">-->
//     <!--                                            <a data-toggle="collapse" href="#dropdown-lvl2">-->
//     <!--                                                <span class="glyphicon glyphicon-off"></span> Sub Level <span class="caret"></span>-->
// <!--                                            </a>-->
// <!--                                            <div id="dropdown-lvl2" class="panel-collapse collapse">-->
// <!--                                                <div class="panel-body">-->
// <!--                                                    <ul class="nav navbar-nav">-->
// <!--                                                        <li><a href="#">Link</a></li>-->
// <!--                                                        <li><a href="#">Link</a></li>-->
// <!--                                                        <li><a href="#">Link</a></li>-->
// <!--                                                    </ul>-->
// <!--                                                </div>-->
// <!--                                            </div>-->
// <!--                                        </li>-->
// <!--                                    </ul>-->
// <!--                                </div>-->
// <!--                            </div>-->
// <!--                        </li>-->

// <li class="active"><a href="dashboard.php"><span class="glyphicon glyphicon-dashboard"></span> Dashboard</a></li>
// <li><a href="loanApplication.php"><span class="glyphicon glyphicon-list-alt"></span> Loans </a></li>
// <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Log out</a></li>