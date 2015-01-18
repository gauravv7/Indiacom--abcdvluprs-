<div class="col-md-12 col-sm-12 col-xs-12" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
    <h3 class="text-theme">Payments</h3>
    <hr>
    <form class="form-horizontal">

        <div id="step1">

            <span class="h3 text-primary">
                Your Outstanding Amount : #Calculate
            </span>

            <table class="table table-responsive table-striped table-hover">
                <thead>
                <tr>
                    <th>Paper ID</th>
                    <th>Paper Title</th>
                    <th>Pending Amount</th>
                    <th>Type</th>
                    <th>Remarks</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <div class="btn-group">
                            <label class="btn btn-info brcheck">
                                <input type="radio" name="brorep" autocomplete="off"> Basic Registration
                            </label>
                        </div>
                        <div class="btn-group">
                            <label class="btn btn-info epcheck">
                                <input type="radio" name="brorep" autocomplete="off"> Extra Paper
                            </label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <div class="btn-group">
                            <label class="btn btn-info brcheck">
                                <input type="checkbox" autocomplete="off"> Basic Registration
                            </label>
                        </div>
                        <div class="btn-group">
                            <label class="btn btn-info epcheck">
                                <input type="checkbox" autocomplete="off"> Extra Paper
                            </label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <div class="btn-group">
                            <label class="btn btn-info brcheck">
                                <input type="checkbox" autocomplete="off"> Basic Registration
                            </label>
                        </div>
                        <div class="btn-group">
                            <label class="btn btn-info epcheck">
                                <input type="checkbox" autocomplete="off"> Extra Paper
                            </label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <div class="btn-group">
                            <label class="btn btn-info brcheck">
                                <input type="checkbox" autocomplete="off"> Basic Registration
                            </label>
                        </div>
                        <div class="btn-group">
                            <label class="btn btn-info epcheck">
                                <input type="checkbox" autocomplete="off"> Extra Paper
                            </label>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
            <div id="forMoreAuthors">
                <div class="contentBlock-top">



                </div>
            </div>
            <div id="addHere">

            </div>

            <div class="contentBlock-top">
                <button type="button" class="btn btn-success" id="addAuthors">
                    Pay for Another Author &nbsp;<span class="glyphicon glyphicon-plus"></span>
                </button>
            </div>
            <hr>
        <span class="h2 text-danger">
            Amount in the selection: #Calculate
        </span>
        </div>
        <div id="step2">
            <div class="form-group">
                <label class="col-sm-3" for="paymentMode">Add Mode of Payment</label>

                <div class="col-sm-6">
                    <select id="paymentMode" class="form-control">
                        <option>Cheque</option>
                        <option>Demand Draft</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3" for="transno">Cheque No / DD No / Wired Trans ID</label>

                <div class="col-sm-6">
                    <input id="transno" type="text" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3" for="transdate">Cheque Date / DD Date / Wired Trans Date</label>

                <div class="col-sm-6">
                    <input id="transdate" type="date" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <input type="submit" class="btn btn-block btn-success" value="Submit Details for Verification">
                </div>
            </div>
        </div>
    </form>
    <div class="contentBlock-top">
        <button class="btn btn-primary" id="showStep1">
            Previous <span class="glyphicon glyphicon-chevron-left"></span>
        </button>
        <button class="btn btn-primary" id="showStep2">
            Next <span class="glyphicon glyphicon-chevron-right"></span>
        </button>
    </div>
</div>
<script>
    $(document).ready(function () {
        $("#step1").show();
        $("#step2").hide();
        $("#showStep1").hide();

        $("#showStep1").click(function () {
            $("#step1").show(500);
            $("#step2").hide(500);
            $("#showStep1").hide();
            $("#showStep2").show();
        });

        $("#showStep2").click(function () {
            $("#step2").show(500);
            $("#step1").hide(500);
            $("#showStep1").show();
            $("#showStep2").hide();
        });

        $("#addAuthor").click(function () {

        });
        $("#addAuthors").click(function(){
            var html1=
            "<span class=\"h3 text-primary\">"+
            "Outstanding Amount for Member ID XY : xyz"+
            "</span>";

            var html2=
            "<div class=\"contentBlock-top\">"+
            "<table class=\"table table-responsive table-striped table-hover\">"+
            "<thead>"+
            "<tr>"+
            "<th>Paper ID</th>"+
            "<th>Paper Title</th>"+
            "<th>Pending Amount</th>"+
            "<th>Type</th>"+
            "<th></th>"+
            "</tr>"+
            "</thead>"+
            "<tbody>"+
            "<tr>"+
            "<td></td>"+
            "<td></td>"+
            "<td></td>"+
            "<td>"+
            "<div class=\"btn-group\">"+
            "<label class=\"btn btn-info\">"+
            "<input type=\"checkbox\" autocomplete=\"off\"> Basic Registration"+
            "</label>"+
            "</div>"+
            "</td>"+
            "</tr>"+
            "</tbody>"+
            "</table>"+
            "</div>";
            var html = html1+html2;

            $("#addHere").append(html);
        });

    });


</script>