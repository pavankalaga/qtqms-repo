@extends('layouts.base')
@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Risk Guide</title>
        <style>
            .stock-planner-table {
                width: 100% !important;
                border-collapse: collapse !important;
                margin-top: 20px !important;
            }

            .stock-planner-table th,
            .stock-planner-table td {
                padding: 10px !important;
                text-align: center !important;
                border: 1px solid #565454 !important;
            }

            .stock-planner-table th {
                background-color: #007BFF !important;
                color: white !important;
                text-align: center !important;
                padding: 10px !important;
            }

            .stock-planner-table input {
                width: 50px;
            }

            .tdBlueColor {
                background-color: #dce6f1;
            }

            .tdPinkColor {
                background-color: #f2dcdb;
            }

            .tdLightColor {
                background-color: #ffffcc;
            }

            .tdLight2Color {
                background-color: rgb(255, 140, 98);
            }

            .tdGreenColor {
                background-color: #ccffcc;
            }

            .tdRedColor {
                background-color: #ff5050;
            }
        </style>
    </head>

    <body>
        <div class="main ">
            <div class="d-flex align-items-center justify-content-between gap-3 tr-second-nav px-3 py-2 heading mb-4">
                <div style="font-size: 20px;">Risk Management Guide</div>
                <div style="font-size: 20px;">
                    <!-- <select>
                                                                <option value="">-- Select Labs --</option>
                                                                <option value="pathology">Lab 1</option>
                                                                <option value="microbiology">Lab 2</option>
                                                                <option value="biochemistry">Lab 3</option>
                                                            </select> -->
                </div>
            </div>

            <div class="table-responsive" style="padding-right: 1rem;">
                <table class="stock-planner-table">
                    <tbody>
                        <tr>
                            <td colspan="9" class="tdBlueColor">
                                <p><strong>SEVERITY</strong></p>
                            </td>
                        </tr>
                        <tr>
                            <td rowspan="2" class="tdBlueColor"><br />
                                <p><strong>SEVERITY</strong></p>
                            </td>
                            <td colspan="7" class="tdBlueColor">
                                <p><strong>SITUATION</strong></p>
                            </td>
                            <td rowspan="2" class="tdBlueColor"><br />
                                <p><strong>RATING</strong></p>
                            </td>
                        </tr>
                        <tr>
                            <td class="tdBlueColor">
                                <p><strong>OPERATIONS</strong></p>
                            </td>
                            <td class="tdBlueColor">
                                <p><strong>FINANCIAL</strong></p>
                            </td>
                            <td class="tdBlueColor">
                                <p><strong>INTERESTED PARTIES</strong></p>
                            </td>
                            <td class="tdBlueColor">
                                <p><strong>ACCIDENTS / INCIDENTS</strong></p>
                            </td>
                            <td class="tdBlueColor">
                                <p><strong>ASSET</strong></p>
                            </td>
                            <td class="tdBlueColor">
                                <p><strong>ENVIRONMENT</strong></p>
                            </td>
                            <td class="tdBlueColor">
                                <p><strong>ENVIRONMENT RECOVERY</strong></p>
                            </td>
                        </tr>
                        <tr>
                            <td class="tdLight2Color"><br /><br />
                                <p><span style="font-weight: 400;">Catastrophic</span></p>
                            </td>
                            <td class="tdLight2Color"><br />
                                <p><span style="font-weight: 400;">Leads to closure of business</span></p>
                            </td>
                            <td class="tdLight2Color"><br />
                                <p><span style="font-weight: 400;">Do not forsee organisation breaking even for following
                                        timeframe.</span></p>
                            </td>
                            <td class="tdLight2Color"><br />
                                <p><span style="font-weight: 400;">Damage to reputation May lead to loss of business</span>
                                </p>
                            </td>
                            <td class="tdLight2Color"> <br /><br />
                                <p><span style="font-weight: 400;">Fatality</span></p>
                            </td>
                            <td class="tdLight2Color"><br /><br />
                                <p><span style="font-weight: 400;">Irreversible damage</span></p>
                            </td>
                            <td class="tdLight2Color"><br />
                                <p><span style="font-weight: 400;">Regional ecosystem damage</span></p>
                            </td>
                            <td class="tdLight2Color"><br />
                                <p><span style="font-weight: 400;">Requires unaffordable significant investment of time and
                                        money for recovery</span></p>
                            </td>
                            <td class="tdLight2Color"><br /><br />
                                <p><span style="font-weight: 400;">5</span></p>
                            </td>
                        </tr>
                        <tr>
                            <td class="tdPinkColor"><br /><br />
                                <p><span style="font-weight: 400;">Serious</span></p>
                            </td>
                            <td class="tdPinkColor"><br />
                                <p><span style="font-weight: 400;">Leads to closure of business</span></p>
                            </td>
                            <td class="tdPinkColor"><br />
                                <p><span style="font-weight: 400;">Do not forsee organisation breaking even for following
                                        timeframe.</span></p>
                            </td>
                            <td class="tdPinkColor"><br />
                                <p><span style="font-weight: 400;">Damage to reputation May lead to loss of business</span>
                                </p>
                            </td>
                            <td class="tdPinkColor"> <br /><br />
                                <p><span style="font-weight: 400;">Fatality</span></p>
                            </td>
                            <td class="tdPinkColor"><br /><br />
                                <p><span style="font-weight: 400;">Irreversible damage</span></p>
                            </td>
                            <td class="tdPinkColor"><br />
                                <p><span style="font-weight: 400;">Regional ecosystem damage</span></p>
                            </td>
                            <td class="tdPinkColor"><br />
                                <p><span style="font-weight: 400;">Requires unaffordable significant investment of time and
                                        money for recovery</span></p>
                            </td>
                            <td class="tdPinkColor"><br /><br />
                                <p><span style="font-weight: 400;">4</span></p>
                            </td>
                        </tr>
                        <tr>
                            <td class="tdLightColor"><br /><br />
                                <p><span style="font-weight: 400;">Major</span></p>
                            </td>
                            <td class="tdLightColor"><br />
                                <p><span style="font-weight: 400;">Affects the organization function and requirement</span>
                                </p>
                            </td>
                            <td class="tdLightColor"><br /><br />
                                <p><span style="font-weight: 400;">Organisation continuously breaks even but no
                                        margin</span></p>
                            </td>
                            <td class="tdLightColor"><br />
                                <p><span style="font-weight: 400;">Damage to reputation, Requires explanation to interested
                                        parties</span></p>
                            </td>
                            <td class="tdLightColor"><br /><br />
                                <p><span style="font-weight: 400;">Major injury</span></p>
                            </td>
                            <td class="tdLightColor"><br /><br />
                                <p><span style="font-weight: 400;">Major damage</span></p>
                            </td>
                            <td class="tdLightColor"><br />
                                <p><span style="font-weight: 400;">Ecosystem damage to company and neighbourig
                                        premises</span></p>
                            </td>
                            <td class="tdLightColor"><br />
                                <p><span style="font-weight: 400;">Requires significant time and money to recover. Can only
                                        be be partially recovered.</span></p>
                            </td>
                            <td class="tdLightColor"><br /><br />
                                <p><span style="font-weight: 400;">3</span></p>
                            </td>
                        </tr>
                        <tr>
                            <td class="tdLightColor"><br /><br />
                                <p><span style="font-weight: 400;">Moderate</span></p>
                            </td>
                            <td class="tdLightColor"><br />
                                <p><span style="font-weight: 400;">Slightly impacts the organization's function and
                                        requirement</span></p>
                            </td>
                            <td class="tdLightColor"><br /><br />
                                <p><span style="font-weight: 400;">Reduces net profit</span></p>
                            </td>
                            <td class="tdLightColor"><br />
                                <p><span style="font-weight: 400;">Requires explanation to interested parties</span></p>
                            </td>
                            <td class="tdLightColor"><br /><br />
                                <p><span style="font-weight: 400;">Minor injury</span></p>
                            </td>
                            <td class="tdLightColor"><br /><br />
                                <p><span style="font-weight: 400;">Minor damage</span></p>
                            </td>
                            <td class="tdLightColor"><br />
                                <p><span style="font-weight: 400;">Ecosysytem damage limited to company premises</span></p>
                            </td>
                            <td class="tdLightColor"><br /><br />
                                <p><span style="font-weight: 400;">Localised and reversible</span></p>
                            </td>
                            <td class="tdLightColor"><br /><br />
                                <p><span style="font-weight: 400;">2</span></p>
                            </td>
                        </tr>
                        <tr>
                            <td class="tdGreenColor"><br />
                                <p><span style="font-weight: 400;">Minor</span></p>
                            </td>
                            <td class="tdGreenColor"><br />
                                <p><span style="font-weight: 400;">No effect</span></p>
                            </td>
                            <td class="tdGreenColor"><br />
                                <p><span style="font-weight: 400;">No considerable loss or profit</span></p>
                            </td>
                            <td class="tdGreenColor">
                                <p><span style="font-weight: 400;">Discomfort to interested parties</span></p>
                            </td>
                            <td class="tdGreenColor"><br />
                                <p><span style="font-weight: 400;">No injury</span></p>
                            </td>
                            <td class="tdGreenColor"><br />
                                <p><span style="font-weight: 400;">No damage</span></p>
                            </td>
                            <td class="tdGreenColor">
                                <p><span style="font-weight: 400;">Ecosystem damage locallized to area of work</span></p>
                            </td>
                            <td class="tdGreenColor"><br />
                                <p><span style="font-weight: 400;">Reversible</span></p>
                            </td>
                            <td class="tdGreenColor"><br />
                                <p><span style="font-weight: 400;">1</span></p>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <p><br /><br /></p>
                <table class="stock-planner-table">
                    <tbody>
                        <tr class="tdBlueColor">
                            <td colspan="3">
                                <p><strong>PROBABILITY</strong></p>
                            </td>
                        </tr>
                        <tr class="tdBlueColor">
                            <td>
                                <p><strong>PROBABILITY</strong></p>
                            </td>
                            <td>
                                <p><strong>SITUATION</strong></p>
                            </td>
                            <td>
                                <p><strong>RATING</strong></p>
                            </td>
                        </tr>
                        <tr class="tdPinkColor">
                            <td><br />
                                <p><span style="font-weight: 400;">Very Likely</span></p>
                            </td>
                            <td>
                                <ul>
                                    <li style="font-weight: 400;"><span style="font-weight: 400;">Risk that has occurred
                                            based on previous record in the organization</span></li>
                                    <li style="font-weight: 400;"><span style="font-weight: 400;">Opportunity that has been
                                            adopted and proven with beneficial result</span></li>
                                </ul>
                            </td>
                            <td><br />
                                <p><span style="font-weight: 400;">5</span></p>
                            </td>
                        </tr>
                        <tr class="tdPinkColor">
                            <td><br />
                                <p><span style="font-weight: 400;">Likely</span></p>
                            </td>
                            <td>
                                <ul>
                                    <li style="font-weight: 400;"><span style="font-weight: 400;">Risk that may occur if
                                            situation is not properly managed due to carelessness, ignorance or
                                            inexperience.</span></li>
                                    <li style="font-weight: 400;"><span style="font-weight: 400;">Opportunity that may be
                                            implemented but with intangible beneficial result</span></li>
                                </ul>
                            </td>
                            <td><br />
                                <p><span style="font-weight: 400;">4</span></p>
                            </td>
                        </tr>
                        <tr class="tdLightColor">
                            <td><br />
                                <p><span style="font-weight: 400;">Possible</span></p>
                            </td>
                            <td><br />
                                <ul>
                                    <li style="font-weight: 400;"><span style="font-weight: 400;">Risk that has not occurred
                                            in the Organization but based on previous record in similar industry or
                                            competitor.</span></li>
                                    <li style="font-weight: 400;"><span style="font-weight: 400;">Opportunity that has not
                                            been adopted by the Organization but has been adopted by similar industry or
                                            competitor with proven good result</span></li>
                                </ul>
                            </td>
                            <td><br />
                                <p><span style="font-weight: 400;">3</span></p>
                            </td>
                        </tr>
                        <tr class="tdLightColor">
                            <td><br />
                                <p><span style="font-weight: 400;">Remote</span></p>
                            </td>
                            <td>
                                <ul>
                                    <li style="font-weight: 400;"><span style="font-weight: 400;">Risk that has not been
                                            known to occur after many years.</span></li>
                                    <li style="font-weight: 400;"><span style="font-weight: 400;">Opportunity that might not
                                            be viable due to requirement of high capability and investment for
                                            implementation</span></li>
                                </ul>
                            </td>
                            <td><br />
                                <p><span style="font-weight: 400;">2</span></p>
                            </td>
                        </tr>
                        <tr class="tdGreenColor">
                            <td><br />
                                <p><span style="font-weight: 400;">Unlikely</span></p>
                            </td>
                            <td><br />
                                <ul>
                                    <li style="font-weight: 400;"><span style="font-weight: 400;">Almost not possible to
                                            happen or implement</span></li>
                                </ul>
                            </td>
                            <td><br />
                                <p><span style="font-weight: 400;">1</span></p>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <p><br /><span style="font-weight: 400;"><br /></span></p>
                <table class="stock-planner-table" style="width: 50% !important;">
                    <tbody>
                        <tr>
                            <td colspan="2" rowspan="2">&nbsp;</td>
                            <td colspan="4"><br />
                                <p><strong>Severity</strong></p>
                            </td>
                        </tr>
                        <tr>
                            <td><br />
                                <p><strong>1</strong></p>
                            </td>
                            <td><br />
                                <p><strong>2</strong></p>
                            </td>
                            <td><br />
                                <p><strong>3</strong></p>
                            </td>
                            <td><br />
                                <p><strong>4</strong></p>
                            </td>
                        </tr>
                        <tr>
                            <td rowspan="5"><br />
                                <p><strong>Probability of Occurrence</strong></p>
                            </td>
                            <td><br />
                                <p><strong>5</strong></p>
                            </td>
                            <td class="tdLightColor"><br />
                                <p><span style="font-weight: 400;">5</span></p>
                            </td>
                            <td class="tdLightColor"><br />
                                <p><span style="font-weight: 400;">10</span></p>
                            </td>
                            <td class="tdRedColor"><br />
                                <p><span style="font-weight: 400;">15</span></p>
                            </td>
                            <td class="tdRedColor"><br />
                                <p><span style="font-weight: 400;">20</span></p>
                            </td>
                        </tr>
                        <tr>
                            <td><br />
                                <p><strong>4</strong></p>
                            </td>
                            <td class="tdGreenColor"><br />
                                <p><span style="font-weight: 400;">4</span></p>
                            </td>
                            <td class="tdLightColor"><br />
                                <p><span style="font-weight: 400;">8</span></p>
                            </td>
                            <td class="tdLightColor"><br />
                                <p><span style="font-weight: 400;">12</span></p>
                            </td>
                            <td class="tdRedColor"><br />
                                <p><span style="font-weight: 400;">16</span></p>
                            </td>
                        </tr>
                        <tr>
                            <td><br />
                                <p><strong>3</strong></p>
                            </td>
                            <td class="tdGreenColor"><br />
                                <p><span style="font-weight: 400;">3</span></p>
                            </td>
                            <td class="tdLightColor"><br />
                                <p><span style="font-weight: 400;">6</span></p>
                            </td>
                            <td class="tdLightColor"><br />
                                <p><span style="font-weight: 400;">9</span></p>
                            </td>
                            <td class="tdLightColor"><br />
                                <p><span style="font-weight: 400;">12</span></p>
                            </td>
                        </tr>
                        <tr>
                            <td><br />
                                <p><strong>2</strong></p>
                            </td>
                            <td class="tdGreenColor"><br />
                                <p><span style="font-weight: 400;">2</span></p>
                            </td>
                            <td class="tdGreenColor"><br />
                                <p><span style="font-weight: 400;">4</span></p>
                            </td>
                            <td class="tdLightColor"><br />
                                <p><span style="font-weight: 400;">6</span></p>
                            </td>
                            <td class="tdLightColor"><br />
                                <p><span style="font-weight: 400;">8</span></p>
                            </td>
                        </tr>
                        <tr>
                            <td><br />
                                <p><strong>1</strong></p>
                            </td>
                            <td class="tdGreenColor"><br />
                                <p><span style="font-weight: 400;">1</span></p>
                            </td>
                            <td class="tdGreenColor"><br />
                                <p><span style="font-weight: 400;">2</span></p>
                            </td>
                            <td class="tdGreenColor"><br />
                                <p><span style="font-weight: 400;">3</span></p>
                            </td>
                            <td class="tdGreenColor"><br />
                                <p><span style="font-weight: 400;">4</span></p>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <p>&nbsp;</p>
                <table class="stock-planner-table">
                    <tbody>
                        <tr>
                            <td>
                                <p><strong>RISK PRIORITY</strong></p>
                            </td>
                            <td>
                                <p><strong>GUIDELINES FOR ACTION</strong></p>
                            </td>
                        </tr>
                        <tr class="tdRedColor">
                            <td>
                                <p><span style="font-weight: 400;">HIGH</span></p>
                                <p><span style="font-weight: 400;">[18~ 25 Points]</span></p>
                            </td>
                            <td>
                                <ul>
                                    <li style="font-weight: 400;"><span style="font-weight: 400;">Immediate intervention
                                            from the top management is needed to ensure that a concrete controls is in place
                                            to avoid occurrence</span></li>
                                    <li style="font-weight: 400;"><span style="font-weight: 400;">Control established must
                                            be able to reduce the Risk to at least Medium Level</span></li>
                                </ul>
                            </td>
                        </tr>
                        <tr class="tdLightColor">
                            <td><br /><br />
                                <p><span style="font-weight: 400;">MEDIUM</span></p>
                                <p><span style="font-weight: 400;">[9~17 Points]</span></p>
                            </td>
                            <td><br />
                                <ul>
                                    <li style="font-weight: 400;"><span style="font-weight: 400;">For 10 points and above,
                                            must be given with additional control to reduce the risk level</span></li>
                                    <li style="font-weight: 400;"><span style="font-weight: 400;">For below 10 points
                                            additional control may be taken if there are any opportunity to do so</span>
                                    </li>
                                    <li style="font-weight: 400;"><span style="font-weight: 400;">Medium Risks shall be
                                            reviewed periodically to ensure that they are not turned into High Risk</span>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                        <tr class="tdGreenColor">
                            <td>
                                <p><span style="font-weight: 400;">LOW</span></p>
                                <p><span style="font-weight: 400;">[1~8 Points]</span></p>
                            </td>
                            <td>
                                <ul>
                                    <li style="font-weight: 400;"><span style="font-weight: 400;">Not compulsory to have
                                            additional control but it may be done voluntary</span></li>
                                    <li style="font-weight: 400;"><span style="font-weight: 400;">Shall be reviewed
                                            regularly to ensure that they are not turned into High Risk</span></li>
                                    <li style="font-weight: 400;"><span style="font-weight: 400;">Reduce the risk to as low
                                            as possible &amp; practical</span></li>
                                </ul>
                            </td>
                        </tr>
                    </tbody>
                </table>

            </div>

        </div>
    </body>

    </html>


@endsection