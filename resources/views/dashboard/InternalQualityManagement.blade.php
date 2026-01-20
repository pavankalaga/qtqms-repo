




<div class="" style=" display: flex;gap: 10px; justify-content:space-between">
    <div class="pivot-tabs2">
        <button class="pivot-tab2 " data-target='monthview'>Lab Monthly View</button>
        <button class="pivot-tab2 active" data-target='dateview'>Lab By Date View </button>

    </div>
    <form action="#" method="post" class="form-container-search">


        <div class="form-group">
            <!-- <label for="appointment-date">Select Date:</label> -->
            <input type="date" id="appointment-date" name="appointment-date" required>
        </div>

        <div class="form-group">
            <!-- <label for="time-availability">Select Department:</label> -->
            <select id="time-availability" name="time-availability" required>
                <option value="">-- Select Department --</option>
                <option value="morning">Department1</option>
                <option value="afternoon">Department2</option>
                <option value="evening">Department2</option>
            </select>
        </div>

        <button type="submit">Search</button>
    </form>

    <div class="pivot-tabs1">
        <button class="pivot-tab1" data-target="ControlsMonitoring1">ILC Monitoring</button>
        <button class="pivot-tab1" data-target="ControlsMonitoring1">Verification Monitoring</button>
        <button class="pivot-tab1" data-target="CalibrationsMonitoring">Calibrations Monitoring</button>
        <button class="pivot-tab1 active" data-target="ControlsMonitoring">Controls Monitoring</button>

    </div>
</div>

<div class="pivot-content1">
    <div class="pivot-panel1 active" id="ControlsMonitoring">
        <div>

            <div class="table-responsive">
                <table class=" stock-planner-table monthview" style="display: none;">
                    <thead>
                        <tr style="position:sticky" class="fixedtr">
                            <th rowspan="2">
                                <div style="justify-content: space-around;">
                                    <span> Labs <i class="fa-solid fa-arrow-right"></i></span>
                                    <br>
                                    <span> <i class="fa-solid fa-arrow-down"></i> Controls</span>
                                </div>
                            </th>
                            <th rowspan="2">Lab 01</th>
                            <th rowspan="2">Lab 02</th>
                            <th rowspan="2">Lab 03</th>
                            <th rowspan="2">Lab 04</th>
                            <th rowspan="2">Lab 05</th>
                            <th rowspan="2">Lab 06</th>
                            <th rowspan="2">Lab 07</th>
                            <th rowspan="2">Lab 08</th>
                            <th rowspan="2">Lab 09</th>
                            <th rowspan="2">Lab 10</th>
                            <th rowspan="2">Lab 11</th>
                            <th rowspan="2">Lab 12</th>
                            <th rowspan="2">Lab 13</th>
                            <th rowspan="2">Lab 14</th>
                            <th rowspan="2">Lab 15</th>
                            <th rowspan="2">Lab 16</th>
                            <th rowspan="2">Lab 17</th>
                            <th rowspan="2">Lab 18</th>
                            <th rowspan="2">Lab 19</th>
                            <th rowspan="2">Lab 20</th>


                        </tr>
                    </thead>
                    <tbody>
                    <tbody>

                        <tr>
                            <td style="background: #007137;color: white;font-weight: 600;" colspan="94">Department 1</td>
                        </tr>
                        @for ($j = 1; $j <= 30; $j++)
                            <tr>
                            <td>
                                parameter 1
                            </td>

                            @for ($i = 1; $i <= 20; $i++)

                                <td>
                                <span><i class="fa-solid fa-circle-check" style="color: #147500;"></i></span>
                                </td>

                                @endfor

                                </tr>
                                @endfor

                    </tbody>
                    </tbody>
                </table>
                <table class=" stock-planner-table dateview ">
                    <thead>
                        <tr style="position:sticky" class="fixedtr">
                            <th rowspan="2">
                                <div style="justify-content: space-around;">
                                    <span> Days <i class="fa-solid fa-arrow-right"></i></span>
                                    <br>
                                    <span> <i class="fa-solid fa-arrow-down"></i> Controls</span>
                                </div>
                            </th>
                            <th rowspan="2">01<sup>st</sup></th>
                            <th rowspan="2">02<sup>nd</sup></th>
                            <th rowspan="2">03<sup>rd</sup></th>
                            <th rowspan="2">04<sup>th</sup></th>
                            <th rowspan="2">05<sup>th</sup></th>
                            <th rowspan="2">06<sup>th</sup></th>
                            <th rowspan="2">07<sup>th</sup></th>
                            <th rowspan="2">08<sup>th</sup></th>
                            <th rowspan="2">09<sup>th</sup></th>
                            <th rowspan="2">10<sup>th</sup></th>
                            <th rowspan="2">11<sup>th</sup></th>
                            <th rowspan="2">12<sup>th</sup></th>
                            <th rowspan="2">13<sup>th</sup></th>
                            <th rowspan="2">14<sup>th</sup></th>
                            <th rowspan="2">15<sup>th</sup></th>
                            <th rowspan="2">16<sup>th</sup></th>
                            <th rowspan="2">17<sup>th</sup></th>
                            <th rowspan="2">18<sup>th</sup></th>
                            <th rowspan="2">19<sup>th</sup></th>
                            <th rowspan="2">20<sup>th</sup></th>
                            <th rowspan="2">21<sup>th</sup></th>
                            <th rowspan="2">22<sup>th</sup></th>
                            <th rowspan="2">23<sup>th</sup></th>
                            <th rowspan="2">24<sup>th</sup></th>
                            <th rowspan="2">25<sup>th</sup></th>
                            <th rowspan="2">26<sup>th</sup></th>
                            <th rowspan="2">27<sup>th</sup></th>
                            <th rowspan="2">28<sup>th</sup></th>
                            <th rowspan="2">29<sup>th</sup></th>
                            <th rowspan="2">30<sup>th</sup></th>
                            <th rowspan="2">31<sup>th</sup></th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td style="background: #007137;color: white;font-weight: 600;" colspan="94">Department 1</td>
                        </tr>
                        @for ($j = 1; $j <= 30; $j++)
                            <tr>
                            <td>
                                parameter 1
                            </td>

                            @for ($i = 1; $i <= 31; $i++)

                                <td>
                                <span><i class="fa-solid fa-circle-check" style="color: #147500;"></i></span>
                                </td>

                                @endfor

                                </tr>
                                @endfor

                    </tbody>


                </table>
            </div>
        </div>
    </div>
    <div class="pivot-panel1" id="CalibrationsMonitoring">
        <div>

            <div class="table-responsive">
                <table class=" stock-planner-table monthview" style="display: none;">
                    <thead>
                        <tr style="position:sticky" class="fixedtr">
                            <th rowspan="2">
                                <div style="justify-content: space-around;">
                                    <span> Labs <i class="fa-solid fa-arrow-right"></i></span>
                                    <br>
                                    <span> <i class="fa-solid fa-arrow-down"></i> Calibrators</span>
                                </div>
                            </th>
                            <th rowspan="2">Lab 01</th>
                            <th rowspan="2">Lab 02</th>
                            <th rowspan="2">Lab 03</th>
                            <th rowspan="2">Lab 04</th>
                            <th rowspan="2">Lab 05</th>
                            <th rowspan="2">Lab 06</th>
                            <th rowspan="2">Lab 07</th>
                            <th rowspan="2">Lab 08</th>
                            <th rowspan="2">Lab 09</th>
                            <th rowspan="2">Lab 10</th>
                            <th rowspan="2">Lab 11</th>
                            <th rowspan="2">Lab 12</th>
                            <th rowspan="2">Lab 13</th>
                            <th rowspan="2">Lab 14</th>
                            <th rowspan="2">Lab 15</th>
                            <th rowspan="2">Lab 16</th>
                            <th rowspan="2">Lab 17</th>
                            <th rowspan="2">Lab 18</th>
                            <th rowspan="2">Lab 19</th>
                            <th rowspan="2">Lab 20</th>

                        </tr>
                    </thead>
                    <tbody>
                    <tbody>

                        <tr>
                            <td style="background: #007137;color: white;font-weight: 600;" colspan="94">Department 1</td>
                        </tr>
                        @for ($j = 1; $j <= 30; $j++)
                            <tr>
                            <td>
                                parameter 1
                            </td>

                            @for ($i = 1; $i <= 20; $i++)

                                <td>
                                <span><i class="fa-solid fa-circle-check" style="color: #147500;"></i></span>
                                </td>

                                @endfor

                                </tr>
                                @endfor

                    </tbody>
                    </tbody>
                </table>
                <table class=" stock-planner-table dateview ">
                    <thead>
                        <tr style="position:sticky" class="fixedtr">
                            <th rowspan="2">
                                <div style="justify-content: space-around;">
                                    <span> Days <i class="fa-solid fa-arrow-right"></i></span>
                                    <br>
                                    <span> <i class="fa-solid fa-arrow-down"></i> Calibrators</span>
                                </div>
                            </th>
                            <th rowspan="2">01<sup>st</sup></th>
                            <th rowspan="2">02<sup>nd</sup></th>
                            <th rowspan="2">03<sup>rd</sup></th>
                            <th rowspan="2">04<sup>th</sup></th>
                            <th rowspan="2">05<sup>th</sup></th>
                            <th rowspan="2">06<sup>th</sup></th>
                            <th rowspan="2">07<sup>th</sup></th>
                            <th rowspan="2">08<sup>th</sup></th>
                            <th rowspan="2">09<sup>th</sup></th>
                            <th rowspan="2">10<sup>th</sup></th>
                            <th rowspan="2">11<sup>th</sup></th>
                            <th rowspan="2">12<sup>th</sup></th>
                            <th rowspan="2">13<sup>th</sup></th>
                            <th rowspan="2">14<sup>th</sup></th>
                            <th rowspan="2">15<sup>th</sup></th>
                            <th rowspan="2">16<sup>th</sup></th>
                            <th rowspan="2">17<sup>th</sup></th>
                            <th rowspan="2">18<sup>th</sup></th>
                            <th rowspan="2">19<sup>th</sup></th>
                            <th rowspan="2">20<sup>th</sup></th>
                            <th rowspan="2">21<sup>th</sup></th>
                            <th rowspan="2">22<sup>th</sup></th>
                            <th rowspan="2">23<sup>th</sup></th>
                            <th rowspan="2">24<sup>th</sup></th>
                            <th rowspan="2">25<sup>th</sup></th>
                            <th rowspan="2">26<sup>th</sup></th>
                            <th rowspan="2">27<sup>th</sup></th>
                            <th rowspan="2">28<sup>th</sup></th>
                            <th rowspan="2">29<sup>th</sup></th>
                            <th rowspan="2">30<sup>th</sup></th>
                            <th rowspan="2">31<sup>th</sup></th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td style="background: #007137;color: white;font-weight: 600;" colspan="94">Department 1</td>
                        </tr>
                        @for ($j = 1; $j <= 30; $j++)
                            <tr>
                            <td>
                                parameter 1
                            </td>

                            @for ($i = 1; $i <= 31; $i++)

                                <td>
                                <span><i class="fa-solid fa-circle-check" style="color: #147500;"></i></span>
                                </td>

                                @endfor

                                </tr>
                                @endfor

                    </tbody>


                </table>
            </div>
        </div>
    </div>
</div>