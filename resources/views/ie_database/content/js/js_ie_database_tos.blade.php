<script type="text/javascript" src="{{ asset('dist/js/jquery-1.11.1.min.js') }}"></script>
<script type="text/javascript">//stopwatch
        //var countClick
        //var stopwatch
            var ms = 0, s = 0, m = 0;
            var timer;
            var stopwatchEl;
            var stopwatchE2;
        //var table
            var table = document.getElementById("tableTOS");
            var stopwatchEl = document.querySelector('.stopwatch');
            var stopwatchE2 = document.querySelector('.stopwatch2');
            var idt1 = document.getElementById("idt1");
            var idt2 = document.getElementById("idt2");
            var idt3 = document.getElementById("idt3");
            var idt4 = document.getElementById("idt4");
            var idt5 = document.getElementById("idt5");
            var countProcess;
            var difference;
            var row,cell1,cell2,cell3,cell4,cell5,cell6,cell7,cell8,cell9,cell10,diferent=0;
            var tt1=0;
            const avg = [];
            const avgDiferent = [];
            var countClick = 0;
            var countClick2 = 0;
            var countClick3 = 0;
            var countClick4 = 0;
            var countClick5 = 0;
            var y2 = 0;
            var y3 = 0;
            var y4 = 0;
            var y5 = 0;
            var hisCTSummary2;
            var hisCTSummary3;
            var hisCTSummary4;
            var hisCTSummary5;
            var hisSumBp2;
            var hisSumBp3;
            var hisSumBp4;
            var hisSumBp5;
            var hisCTAllowance2;
            var hisCTAllowance3;
            var hisCTAllowance4;
            var hisCTAllowance5;
            var hisCapaPerHour2;
            var hisCapaPerHour3;
            var hisCapaPerHour4;
            var hisCapaPerHour5;
            // arrDiferent
                const arrayMinCT = [];
                const arrayCT=[];
                const arr1 = [];
                const arr2 = [];
                const arr3 = [];
                const arr4 = [];
                const arr5 = [];

                const arrDifferent1 = [];
                const arrDifferent2 = [];
                const arrDifferent3 = [];
                const arrDifferent4 = [];
                const arrDifferent5 = [];
            
            //sum diference 
                const arraySumdif2=[];
                const arraySumdif3=[];
                const arraySumdif4=[];
                const arraySumdif5=[];
            
            // avg min array
                const arrayAvg2=[];
                const arrayAvg3=[];
                const arrayAvg4=[];
                const arrayAvg5=[];

                const arrayMin2=[];
                const arrayMin3=[];
                const arrayMin4=[];
                const arrayMin5=[];
            
            // array angka even
                const arrayAngka=[];

            var avgDiferentResult;
            var formatAvgDiferentResult;
            var minDiferentResult;
            var formatMinDiferentResult;
            const ListElementTime = [];
            const ListAvgDiferentResult =[];
        //var summary
            var arrCapacity, arrSumArrayCT, arrSumMinCT, arrCTAllowance=0;
            var process_unit;
        //stopwatch
            function start() {
                    if(!timer) {
                        timer = setInterval(run, 10);
                    }
            }
            function run() {
                stopwatchEl.textContent = getTimer();
                ms++;
                    if(ms == 100) {
                        ms = 0;
                        s++;
                    }
                    if(s == 60) {
                        s = 0;
                        m++;
                    }
            }
            function pause() {
                var id_video = document.getElementById('input-tag').value;
                var process = document.getElementById('process').value;
                var style = document.getElementById('style').value;
                var gender = document.getElementById('gender').value; 
                var area = document.getElementById('area').value;
                var observer = document.getElementById('observer').value;
                var video = document.getElementById('input-tag').value;
                var name_element = document.getElementsByName('name_element').values;

                if (process==""||style==""||gender==""||area=="--select area--"||observer==""||video==""||id_video=="") {
                    alert("All data is not filled / Video not open yet");
                    document.getElementById("process").setAttribute("style","background: rgb(223, 82, 82);color: white;");
                    document.getElementById("style").setAttribute("style","background: rgb(223, 82, 82);color: white;");
                    document.getElementById("gender").setAttribute("style","background: rgb(223, 82, 82);color: white;");
                    document.getElementById("area").setAttribute("style","background: rgb(223, 82, 82);color: white;");
                    document.getElementById("observer").setAttribute("style","background: rgb(223, 82, 82);color: white;");
                    document.getElementById("input-tag").setAttribute("style","background: rgb(223, 82, 82);color: white;");
                }else{
                    if(timer){
                        stopTimer();
                        event.target.value = 'Start';
                        stopwatchE2.value=getTimer();
                    }else{
                        start();
                        event.target.value = 'Stop';
                    }
                }
            }
            function stop() {
                if(timer) {
                    stopwatchE2.value=getTimer();
                    stopTimer();
                    ms = 0;
                    s = 0;
                    m = 0;
                    stopwatchEl.textContent = getTimer();
                    document.getElementById("stopwatch2").value="";

                }else{
                    stopwatchE2.value=getTimer();
                    stopTimer();
                    ms = 0;
                    s = 0;
                    m = 0;
                    stopwatchEl.textContent = getTimer();
                    document.getElementById("stopwatch2").value="";
                }
            }
            function stopTimer() {
                clearInterval(timer);
                timer = false;
            }
            function getTimer() 
            {
                return (m < 10 ? "0" + m : m) + ":" + (s < 10 ? "0" + s : s) + ":" + (ms < 10 ? "0" + ms : ms);
            }
        // isi table   
            function toSeconds(time_str) {
                    // Extract hours, minutes and seconds
                    var parts = time_str.split(':');
                    // compute  and return total seconds
                    return parts[0] * 60 + // a minute has 60 seconds
                    parts[1] * 100 + // a seconds has 60 mili seconds
                    +
                    parts[2]; // mili seconds
                }

            function getDiferent()
            {
                difference=0;
                var getD1 = getTimer();
                var getD2 = document.getElementById("stopwatch2").value;
                    var a = getD1.split(':'); // split it at the colons
                    var b = getD2.split(':'); // split it at the colons

                    // minutes are worth 60 seconds. Hours are worth 60 minutes.
                    var msGetD1 = (+a[0]) * 60 * 100 + (+a[1]) * 100 + (+a[2]); 
                    var msGetD2 = (+b[0]) * 60 * 100 + (+b[1]) * 100 + (+b[2]); 
                difference = Math.abs(msGetD1- msGetD2);
                if (isNaN(difference)) {
                    difference=toSeconds(getD1);
                }
                avg.push(toSeconds(getD1));
                avgDiferent.push(difference);
                    // format time differnece
                    diferent = [
                        Math.floor(difference / 6000), // an minute has 6000 mili seconds
                        Math.floor((difference % 6000) / 100), // a seconds has 100 mili seconds
                        difference % 100
                    ];
                    // 0 padding and concatation
                    diferent = diferent.map(function(v) {
                        return v < 10 ? '0' + v : v;
                    }).join(':');
            }
            function inputTOS1()
            {
                if (countClick==1) {
                    //numpang bikin array
                    for (let i = 0; i < parseInt(countProcess)*2; i+=2) {
                        arrayAngka.push(i);
                    }
                    diferent=getTimer();
                    //add array ct
                        // ct1.push(getTimer());
                            arrDifferent1.push(difference);
                            arr1.push(toSeconds(getTimer()));
                    //total time study 1
                        tt1=getTimer();
                        idt1.value=tt1;
                        table.insertRow(-1).innerHTML=  '<tr style="vertical-align: middle;">'+
                                                        '<td rowspan="2" style="font-size: 12px; width: 2.94%">'+countClick+'</td>'+
                                                        '<td rowspan="2" style="font-size: 12px; width: 19.91%"><input type="text" onClick="this.select();" class="form-control" name="name_element[]" value="Elements Default"></td>'+
                                                        '<td style="font-size: 12px; width: 5.88%"><input type="text" class="inputSmall" name="ct1[]" value="'+diferent+'" readonly></td>'+
                                                        '<td style="font-size: 12px; width: 5.88%"></td>'+
                                                        '<td style="font-size: 12px; width: 5.88%"></td>'+
                                                        '<td style="font-size: 12px; width: 5.88%"></td>'+
                                                        '<td style="font-size: 12px; width: 5.88%"></td>'+
                                                        '<td rowspan="2" style="font-size: 12px; width: 5.88%"></td>'+
                                                        '<td rowspan="2" style="font-size: 12px; width: 13.01%"></td>'+
                                                        '<td rowspan="2" style="font-size: 11px; width: 9.77%">'+
                                                        '<select onchange="ChangeElement(this)" name="value[]"><option value="">-</option><option value="VA">VA</option><option value="NVA">NVA</option><option value="NVAN" >NVAN</option></select>'+
                                                        '</td>'+
                                                        '<td rowspan="2" style="font-size: 11px; width: 18.59%"><textarea class="form-control" name="pointObserver" placeholder="Input Point hire"></textarea></td>'
                                                    '</tr>';
                        table.insertRow(-1).innerHTML=  '<tr style="vertical-align: middle;">'+
                                                        '<td><input type="text" class="inputSmall" name="t1[]" value="'+getTimer()+'" readonly></td>'+
                                                        '<td></td>'+
                                                        '<td></td>'+
                                                        '<td></td>'+
                                                        '<td></td>'+
                                                    '</tr>';
                    //add array element time
                        ListElementTime.push("VA");
                        ListAvgDiferentResult.push("1");
                }else{
                    // ct1.push(diferent);
                        arrDifferent1.push(difference);
                        arr1.push(toSeconds(getTimer()));
                    //total time study 1
                        tt1=getTimer();
                        idt1.value=tt1;
                        table.insertRow(-1).innerHTML=  '<tr style="vertical-align: middle;">'+
                                                        '<td rowspan="2" style="font-size: 12px; width: 2.94%">'+countClick+'</td>'+
                                                        '<td rowspan="2" style="font-size: 12px; width: 19.91%"><input type="text" onClick="this.select();" class="form-control" name="name_element[]" value="Elements Default"></td>'+
                                                        '<td style="font-size: 12px; width: 5.88%"><input type="text" class="inputSmall" name="ct1[]" value="'+diferent+'" readonly></td>'+
                                                        '<td style="font-size: 12px; width: 5.88%"></td>'+
                                                        '<td style="font-size: 12px; width: 5.88%"></td>'+
                                                        '<td style="font-size: 12px; width: 5.88%"></td>'+
                                                        '<td style="font-size: 12px; width: 5.88%"></td>'+
                                                        '<td rowspan="2" style="font-size: 12px; width: 5.88%"></td>'+
                                                        '<td rowspan="2" style="font-size: 12px; width: 13.01%"></td>'+
                                                        '<td rowspan="2" style="font-size: 11px; width: 9.77%">'+
                                                        '<select onchange="ChangeElement(this)" name="value[]"><option value="">-</option><option value="VA">VA</option><option value="NVA">NVA</option><option value="NVAN">NVAN</option></select>'+
                                                        '</td>'+
                                                        '<td rowspan="2" style="font-size: 11px; width: 18.59%"><textarea class="form-control" name="pointObserver[]" placeholder="Input Point hire"></textarea></td>'
                                                    '</tr>';
                        table.insertRow(-1).innerHTML=  '<tr style="vertical-align: middle;">'+
                                                        '<td><input class="inputSmall" type="text" name="t1[]" value="'+getTimer()+'" readonly></td>'+
                                                        '<td></td>'+
                                                        '<td></td>'+
                                                        '<td></td>'+
                                                        '<td></td>'+
                                                    '</tr>';
                    //add array element time
                        ListElementTime.push("VA");
                        ListAvgDiferentResult.push("1");
                }
            }
            function inputTOS2()
            {
                countClick2++
                if (countClick2<=countProcess) {
                    //search avg biasa
                        arr2.push(toSeconds(getTimer()));
                    //DATA AVG
                        avgDiferentResult = 0;
                        arrDifferent2.push(difference);
                        avgDiferentResult = Math.floor((arrDifferent1[countClick2-1]+arrDifferent2[countClick2-1])/2);
                        formatavgDiferentResult = [
                                Math.floor(avgDiferentResult / 6000), // an minute has 6000 mili seconds
                                Math.floor((avgDiferentResult % 6000) / 100), // a seconds has 100 mili seconds
                                avgDiferentResult % 100
                            ];
                            // 0 padding and concatation
                            formatavgDiferentResult = formatavgDiferentResult.map(function(v) {
                                return v < 10 ? '0' + v : v;
                            }).join(':');
                        //summary avg ct
                            var sumArrayCT=0;
                            arrayCT.push(avgDiferentResult)
                                for (let i = 0; i < arrayCT.length; i++) {
                                    sumArrayCT += Math.round(arrayCT[i]);
                                }
                            //for Cycle Time + allowance 15%
                                var CTAllowance=Math.round(sumArrayCT*1.15);
                            // //for capacity / hour
                                capaPerHour = Math.floor(3600/(CTAllowance/100));
                                arrCapacity=capaPerHour;
                                hisCapaPerHour2=capaPerHour+" "+process_unit;
                                document.getElementById("CapaPerHour").value = capaPerHour+" "+process_unit; 
                            formatSumArrayCT = [
                                Math.floor(sumArrayCT / 6000), // an minute has 6000 mili seconds
                                Math.floor((sumArrayCT % 6000) / 100), // a seconds has 100 mili seconds
                                sumArrayCT % 100
                            ];
                            // 0 padding and concatation
                            formatSumArrayCT = formatSumArrayCT.map(function(v) {
                                return v < 10 ? '0' + v : v;
                            }).join(':');
                            arrSumArrayCT=formatSumArrayCT;
                            hisCTSummary2=formatSumArrayCT+" Sec";
                            document.getElementById("CTSummary").value = formatSumArrayCT+" Sec"; 
                    //search min difrene 
                        minDiferentResult = 0;                                                                                             
                        minDiferentResult = Math.min(arrDifferent1[countClick2-1],arrDifferent2[countClick2-1]);
                        formatminDiferentResult = [
                                Math.floor(minDiferentResult / 6000), // an minute has 6000 mili seconds
                                Math.floor((minDiferentResult % 6000) / 100), // a seconds has 100 mili seconds
                                minDiferentResult % 100
                            ];
                            // 0 padding and concatation
                            formatminDiferentResult = formatminDiferentResult.map(function(v) {
                                return v < 10 ? '0' + v : v;
                            }).join(':');
                        //summary avg ct
                            var sumMinCT=0;
                            arrayMinCT.push(minDiferentResult)
                            for (let i = 0; i < arrayMinCT.length; i++) {
                                sumMinCT += Math.round(arrayMinCT[i]);
                            }
                            formatSumMinCT = [
                                Math.floor(sumMinCT / 6000), // an minute has 6000 mili seconds
                                Math.floor((sumMinCT % 6000) / 100), // a seconds has 100 mili seconds
                                sumMinCT % 100
                            ];
                            // 0 padding and concatation
                            formatSumMinCT = formatSumMinCT.map(function(v) {
                                return v < 10 ? '0' + v : v;
                            }).join(':');
                            arrSumMinCT=formatSumMinCT;
                            hisSumBp2=formatSumMinCT+" Sec";
                            document.getElementById("sumBP").value = formatSumMinCT+" Sec"; 
                        //summary CTAllowance
                            formatCTAllowance = [
                                Math.floor(CTAllowance / 6000), // an minute has 6000 mili seconds
                                Math.floor((CTAllowance % 6000) / 100), // a seconds has 100 mili seconds
                                CTAllowance % 100
                            ];
                            // 0 padding and concatation
                            formatCTAllowance = formatCTAllowance.map(function(v) {
                                return v < 10 ? '0' + v : v;
                            }).join(':');
                            arrCTAllowance=formatCTAllowance;
                            hisCTAllowance2=formatCTAllowance+" Sec";
                            document.getElementById("CTAllowance").value = formatCTAllowance+" Sec";
                        //total time study 2
                            var tt2=0;
                            arraySumdif2.push(difference);
                            for (let i = 0; i < arraySumdif2.length; i++) {
                                tt2 += Math.round(arraySumdif2[i]);
                            }
                                formatSumTT = [
                                    Math.floor(tt2 / 6000), // an minute has 6000 mili seconds
                                    Math.floor((tt2 % 6000) / 100), // a seconds has 100 mili seconds
                                    tt2 % 100
                                ];
                                formatSumTT = formatSumTT.map(function(v) {
                                return v < 10 ? '0' + v : v;
                            }).join(':');
                            idt2.value=formatSumTT;
                    if (countClick2==1) {
                        var x = document.getElementById("TableTos").rows[0].cells[3].innerHTML='<input type="text" class="inputSmall row2" onClick="DeleteCell(2)" name="ct2[]" value="'+diferent+'" readonly>';
                        var x = document.getElementById("TableTos").rows[1].cells[1].innerHTML='<input type="text" class="inputSmall row2" onClick="DeleteCell(2)" name="t2[]" value="'+getTimer()+'" readonly>';
                        var x = document.getElementById("TableTos").rows[0].cells[7].innerHTML='<input type="text" class="inputSmall" name="avg[]" value="'+formatavgDiferentResult+'" readonly>';  
                        var x = document.getElementById("TableTos").rows[0].cells[8].innerHTML='<input type="text" class="inputSmall" name="min[]" value="'+formatminDiferentResult+'" readonly>';  
                        arrayAvg2.push(formatavgDiferentResult);
                        arrayMin2.push(formatminDiferentResult);
                    }else if(countClick2==2){
                        var x = document.getElementById("TableTos").rows[2].cells[3].innerHTML='<input type="text" class="inputSmall row2" onClick="DeleteCell(2)" name="ct2[]" value="'+diferent+'" readonly>';  
                        var x = document.getElementById("TableTos").rows[3].cells[1].innerHTML='<input type="text" class="inputSmall row2" onClick="DeleteCell(2)" name="t2[]" value="'+getTimer()+'" readonly>';  
                        var x = document.getElementById("TableTos").rows[2].cells[7].innerHTML='<input type="text" class="inputSmall" name="avg[]" value="'+formatavgDiferentResult+'" readonly>'; 
                        var x = document.getElementById("TableTos").rows[2].cells[8].innerHTML='<input type="text" class="inputSmall" name="min[]" value="'+formatminDiferentResult+'" readonly>';  
                        arrayAvg2.push(formatavgDiferentResult);
                        arrayMin2.push(formatminDiferentResult);
                    }else{
                        y2++
                        var n=countClick2+1;
                        var x = document.getElementById("TableTos").rows[countClick2+y2].cells[3].innerHTML='<input type="text" class="inputSmall row2" onClick="DeleteCell(2)" name="ct2[]" value="'+diferent+'" readonly>';  
                        var x = document.getElementById("TableTos").rows[countClick2+y2+1].cells[1].innerHTML='<input type="text" class="inputSmall row2" onClick="DeleteCell(2)" name="t2[]" value="'+getTimer()+'" readonly>';
                        var x = document.getElementById("TableTos").rows[countClick2+y2].cells[7].innerHTML='<input type="text" class="inputSmall" name="avg[]" value="'+formatavgDiferentResult+'" readonly>';
                        var x = document.getElementById("TableTos").rows[countClick2+y2].cells[8].innerHTML='<input type="text" class="inputSmall" name="min[]" value="'+formatminDiferentResult+'" readonly>';
                        arrayAvg2.push(formatavgDiferentResult);
                        arrayMin2.push(formatminDiferentResult);
                    }
                    console.log(arrayAvg2);
                    ListAvgDiferentResult.splice(countClick2-1,1,avgDiferentResult.toFixed(2));
                }else{
                    inputTos3();
                }
            }
            function inputTos3()
            {
                countClick3++
                if (countClick3<=countProcess) {
                    //search avg biasa
                        arr3.push(toSeconds(getTimer()));
                    //search avg diferent
                        avgDiferentResult = 0;
                        arrDifferent3.push(difference);
                        avgDiferentResult = Math.floor((arrDifferent1[countClick3-1]+arrDifferent2[countClick3-1]+arrDifferent3[countClick3-1])/3);
                        formatavgDiferentResult = [
                                Math.floor(avgDiferentResult / 6000), // an minute has 6000 mili seconds
                                Math.floor((avgDiferentResult % 6000) / 100), // a seconds has 100 mili seconds
                                avgDiferentResult % 100
                            ];
                            // 0 padding and concatation
                            formatavgDiferentResult = formatavgDiferentResult.map(function(v) {
                                return v < 10 ? '0' + v : v;
                            }).join(':');
                        //summary avg ct
                            var sumArrayCT=0;
                            arrayCT[countClick3-1]=avgDiferentResult;
                            for (let i = 0; i < arrayCT.length; i++) {
                                sumArrayCT += Math.round(arrayCT[i]);
                            }
                            //for Cycle Time + allowance 15%
                                var CTAllowance=Math.round(sumArrayCT*1.15);
                                
                            // //for capacity / hour
                                var capaPerHour = Math.floor(3600/(CTAllowance/100));
                                arrCapacity=capaPerHour;
                                hisCapaPerHour3=capaPerHour+" "+process_unit;
                                document.getElementById("CapaPerHour").value = capaPerHour+" "+process_unit;
                            formatSumArrayCT = [
                                Math.floor(sumArrayCT / 6000), // an minute has 6000 mili seconds
                                Math.floor((sumArrayCT % 6000) / 100), // a seconds has 100 mili seconds
                                sumArrayCT % 100
                            ];
                            // 0 padding and concatation
                            formatSumArrayCT = formatSumArrayCT.map(function(v) {
                                return v < 10 ? '0' + v : v;
                            }).join(':');
                            arrSumArrayCT=formatSumArrayCT;
                            hisCTSummary3=formatSumArrayCT+" Sec";
                            document.getElementById("CTSummary").value = formatSumArrayCT+" Sec";
                    //search min difrene
                        minDiferentResult = 0; 
                        minDiferentResult = Math.min(arrDifferent1[countClick3-1],arrDifferent2[countClick3-1],arrDifferent3[countClick3-1]);
                        formatminDiferentResult = [
                                Math.floor(minDiferentResult / 6000), // an minute has 6000 mili seconds
                                Math.floor((minDiferentResult % 6000) / 100), // a seconds has 100 mili seconds
                                minDiferentResult % 100
                            ];
                            // 0 padding and concatation
                            formatminDiferentResult = formatminDiferentResult.map(function(v) {
                                return v < 10 ? '0' + v : v;
                            }).join(':');
                        //summary avg ct
                            var sumMinCT=0;
                            arrayMinCT[countClick3-1]=minDiferentResult;
                            for (let i = 0; i < arrayMinCT.length; i++) {
                                sumMinCT += Math.round(arrayMinCT[i]);
                            }
                            formatSumMinCT = [
                                Math.floor(sumMinCT / 6000), // an minute has 6000 mili seconds
                                Math.floor((sumMinCT % 6000) / 100), // a seconds has 100 mili seconds
                                sumMinCT % 100
                            ];
                            // 0 padding and concatation
                            formatSumMinCT = formatSumMinCT.map(function(v) {
                                return v < 10 ? '0' + v : v;
                            }).join(':');
                            arrSumMinCT=formatSumMinCT;
                            hisSumBp3=formatSumMinCT+" Sec";
                            document.getElementById("sumBP").value = formatSumMinCT+" Sec";
                        //summary CTAllowance
                            formatCTAllowance = [
                                    Math.floor(CTAllowance / 6000), // an minute has 6000 mili seconds
                                    Math.floor((CTAllowance % 6000) / 100), // a seconds has 100 mili seconds
                                    CTAllowance % 100
                                ];
                                // 0 padding and concatation
                                formatCTAllowance = formatCTAllowance.map(function(v) {
                                    return v < 10 ? '0' + v : v;
                                }).join(':');
                                arrCTAllowance=formatCTAllowance;
                                hisCTAllowance3=formatCTAllowance+" Sec";
                                document.getElementById("CTAllowance").value = formatCTAllowance+" Sec";
                        //total time study 3
                            var tt3=0;
                            arraySumdif3.push(difference);
                            for (let i = 0; i < arraySumdif3.length; i++) {
                                tt3 += Math.round(arraySumdif3[i]);
                            }
                                formatSumTT = [
                                    Math.floor(tt3 / 6000), // an minute has 6000 mili seconds
                                    Math.floor((tt3 % 6000) / 100), // a seconds has 100 mili seconds
                                    tt3 % 100
                                ];
                                formatSumTT = formatSumTT.map(function(v) {
                                return v < 10 ? '0' + v : v;
                            }).join(':');
                            idt3.value=formatSumTT;
                    // ct3.push(diferent);
                    // t3.push(getTimer());
                    if (countClick3==1) {
                        var x = document.getElementById("TableTos").rows[0].cells[4].innerHTML='<input type="text" class="inputSmall row3" onClick="DeleteCell(3)" name="ct3[]" value="'+diferent+'"  readonly>';  
                        var x = document.getElementById("TableTos").rows[1].cells[2].innerHTML='<input type="text" class="inputSmall row3" onClick="DeleteCell(3)" name="t3[]" value="'+getTimer()+'"  readonly>';  
                        var x = document.getElementById("TableTos").rows[0].cells[7].innerHTML='<input type="text" class="inputSmall" name="avg[]" value="'+formatavgDiferentResult+'"  readonly>';  
                        var x = document.getElementById("TableTos").rows[0].cells[8].innerHTML='<input type="text" class="inputSmall" name="min[]" value="'+formatminDiferentResult+'"  readonly>'; 
                        arrayAvg3.push(formatavgDiferentResult);
                        arrayMin3.push(formatminDiferentResult); 
                    }else if(countClick3==2){
                        var x = document.getElementById("TableTos").rows[2].cells[4].innerHTML='<input type="text" class="inputSmall row3" onClick="DeleteCell(3)" name="ct3[]" value="'+diferent+'"  readonly>';  
                        var x = document.getElementById("TableTos").rows[3].cells[2].innerHTML='<input type="text" class="inputSmall row3" onClick="DeleteCell(3)" name="t3[]" value="'+getTimer()+'"  readonly>'; 
                        var x = document.getElementById("TableTos").rows[2].cells[7].innerHTML='<input type="text" class="inputSmall" name="avg[]" value="'+formatavgDiferentResult+'"  readonly>';  
                        var x = document.getElementById("TableTos").rows[2].cells[8].innerHTML='<input type="text" class="inputSmall" name="min[]" value="'+formatminDiferentResult+'"  readonly>';  
                        arrayAvg3.push(formatavgDiferentResult);
                        arrayMin3.push(formatminDiferentResult); 
                    }else{
                        y3++
                        var x = document.getElementById("TableTos").rows[countClick3+y3].cells[4].innerHTML='<input type="text" class="inputSmall row3" onClick="DeleteCell(3)" name="ct3[]" value="'+diferent+'"  readonly>';  
                        var x = document.getElementById("TableTos").rows[countClick3+y3+1].cells[2].innerHTML='<input type="text" class="inputSmall row3" onClick="DeleteCell(3)" name="t3[]" value="'+getTimer()+'"  readonly>'; 
                        var x = document.getElementById("TableTos").rows[countClick3+y3].cells[7].innerHTML='<input type="text" class="inputSmall" name="avg[]" value="'+formatavgDiferentResult+'"  readonly>';  
                        var x = document.getElementById("TableTos").rows[countClick3+y3].cells[8].innerHTML='<input type="text" class="inputSmall" name="min[]" value="'+formatminDiferentResult+'"  readonly>';
                        arrayAvg3.push(formatavgDiferentResult);
                        arrayMin3.push(formatminDiferentResult); 
                    }
                    console.log(arrayAvg3);
                    ListAvgDiferentResult.splice(countClick3-1,1,avgDiferentResult.toFixed(2));
                }else{
                    inputTos4();
                }
            }
            function inputTos4()
            {
                countClick4++
                if (countClick4<=countProcess) {
                        arr4.push(toSeconds(getTimer()));
                    //search avg diferent
                        avgDiferentResult = 0;
                        arrDifferent4.push(difference);
                        avgDiferentResult = Math.floor((arrDifferent1[countClick4-1]+arrDifferent2[countClick4-1]+arrDifferent3[countClick4-1]+arrDifferent4[countClick4-1])/4);
                        formatavgDiferentResult = [
                                Math.floor(avgDiferentResult / 6000), // an minute has 6000 mili seconds
                                Math.floor((avgDiferentResult % 6000) / 100), // a seconds has 100 mili seconds
                                avgDiferentResult % 100
                            ];
                            // 0 padding and concatation
                            formatavgDiferentResult = formatavgDiferentResult.map(function(v) {
                                return v < 10 ? '0' + v : v;
                            }).join(':');
                        //summary avg ct
                            var sumArrayCT=0;
                            arrayCT[countClick4-1]=avgDiferentResult;
                            for (let i = 0; i < arrayCT.length; i++) {
                                sumArrayCT += Math.round(arrayCT[i]);
                            }
                            //for Cycle Time + allowance 15%
                                var CTAllowance=Math.round(sumArrayCT*1.15);
                                
                            // //for capacity / hour
                                var capaPerHour = Math.floor(3600/(CTAllowance/100));
                                arrCapacity=capaPerHour;
                                hisCapaPerHour4=capaPerHour+" "+process_unit;
                                document.getElementById("CapaPerHour").value = capaPerHour+" "+process_unit;
                            formatSumArrayCT = [
                                Math.floor(sumArrayCT / 6000), // an minute has 6000 mili seconds
                                Math.floor((sumArrayCT % 6000) / 100), // a seconds has 100 mili seconds
                                sumArrayCT % 100
                            ];
                            // 0 padding and concatation
                            formatSumArrayCT = formatSumArrayCT.map(function(v) {
                                return v < 10 ? '0' + v : v;
                            }).join(':');
                            arrSumArrayCT=formatSumArrayCT; 
                            hisCTSummary4=formatSumArrayCT+" Sec";
                            document.getElementById("CTSummary").value = formatSumArrayCT+" Sec";
                    //search min difrene
                        minDiferentResult = 0;
                        minDiferentResult = Math.min(arrDifferent1[countClick4-1],arrDifferent2[countClick4-1],arrDifferent3[countClick4-1],arrDifferent4[countClick4-1]);
                        formatminDiferentResult = [
                                Math.floor(minDiferentResult / 6000), // an minute has 6000 mili seconds
                                Math.floor((minDiferentResult % 6000) / 100), // a seconds has 100 mili seconds
                                minDiferentResult % 100
                            ];
                            // 0 padding and concatation
                            formatminDiferentResult = formatminDiferentResult.map(function(v) {
                                return v < 10 ? '0' + v : v;
                            }).join(':');
                        //summary avg ct
                            var sumMinCT=0;
                            arrayMinCT[countClick4-1]=minDiferentResult;
                            for (let i = 0; i < arrayMinCT.length; i++) {
                                sumMinCT += Math.round(arrayMinCT[i]);
                            }
                            formatSumMinCT = [
                                Math.floor(sumMinCT / 6000), // an minute has 6000 mili seconds
                                Math.floor((sumMinCT % 6000) / 100), // a seconds has 100 mili seconds
                                sumMinCT % 100
                            ];
                            // 0 padding and concatation
                            formatSumMinCT = formatSumMinCT.map(function(v) {
                                return v < 10 ? '0' + v : v;
                            }).join(':');
                            arrSumMinCT=formatSumMinCT; 
                            hisSumBp4=formatSumMinCT+" Sec";
                            document.getElementById("sumBP").value = formatSumMinCT+" Sec";
                        //summary CTAllowance
                            formatCTAllowance = [
                                    Math.floor(CTAllowance / 6000), // an minute has 6000 mili seconds
                                    Math.floor((CTAllowance % 6000) / 100), // a seconds has 100 mili seconds
                                    CTAllowance % 100
                                ];
                                // 0 padding and concatation
                                formatCTAllowance = formatCTAllowance.map(function(v) {
                                    return v < 10 ? '0' + v : v;
                                }).join(':');
                                arrCTAllowance=formatCTAllowance; 
                                hisCTAllowance4=formatCTAllowance+" Sec";
                                document.getElementById("CTAllowance").value = formatCTAllowance+" Sec";
                        //total time study 4
                            var tt4=0;
                            arraySumdif4.push(difference);
                            for (let i = 0; i < arraySumdif4.length; i++) {
                                tt4 += Math.round(arraySumdif4[i]);
                            }
                                formatSumTT = [
                                    Math.floor(tt4 / 6000), // an minute has 6000 mili seconds
                                    Math.floor((tt4 % 6000) / 100), // a seconds has 100 mili seconds
                                    tt4 % 100
                                ];
                                formatSumTT = formatSumTT.map(function(v) {
                                return v < 10 ? '0' + v : v;
                            }).join(':');
                            idt4.value=formatSumTT;
                    // ct4.push(diferent);
                    // t4.push(getTimer());
                    if (countClick4==1) {
                        var x = document.getElementById("TableTos").rows[0].cells[5].innerHTML='<input type="text" class="inputSmall row4" onClick="DeleteCell(4)" name="ct4[]" value="'+diferent+'"  readonly>';  
                        var x = document.getElementById("TableTos").rows[1].cells[3].innerHTML='<input type="text" class="inputSmall row4" onClick="DeleteCell(4)" name="t4[]" value="'+getTimer()+'"  readonly>';  
                        var x = document.getElementById("TableTos").rows[0].cells[7].innerHTML='<input type="text" class="inputSmall" name="avg[]" value="'+formatavgDiferentResult+'"  readonly>';  
                        var x = document.getElementById("TableTos").rows[0].cells[8].innerHTML='<input type="text" class="inputSmall" name="min[]" value="'+formatminDiferentResult+'"  readonly>';  
                        arrayAvg4.push(formatavgDiferentResult);
                        arrayMin4.push(formatminDiferentResult); 
                    }else if(countClick4==2){
                        var x = document.getElementById("TableTos").rows[2].cells[5].innerHTML='<input type="text" class="inputSmall row4" onClick="DeleteCell(4)" name="ct4[]" value="'+diferent+'"  readonly>';  
                        var x = document.getElementById("TableTos").rows[3].cells[3].innerHTML='<input type="text" class="inputSmall row4" onClick="DeleteCell(4)" name="t4[]" value="'+getTimer()+'"  readonly>';  
                        var x = document.getElementById("TableTos").rows[2].cells[7].innerHTML='<input type="text" class="inputSmall" name="avg[]" value="'+formatavgDiferentResult+'"  readonly>';  
                        var x = document.getElementById("TableTos").rows[2].cells[8].innerHTML='<input type="text" class="inputSmall" name="min[]" value="'+formatminDiferentResult+'"  readonly>';  
                        arrayAvg4.push(formatavgDiferentResult);
                        arrayMin4.push(formatminDiferentResult); 
                    }else{
                        y4++
                        var x = document.getElementById("TableTos").rows[countClick4+y4].cells[5].innerHTML='<input type="text" class="inputSmall row4" onClick="DeleteCell(4)" name="ct4[]" value="'+diferent+'"  readonly>';  
                        var x = document.getElementById("TableTos").rows[countClick4+y4+1].cells[3].innerHTML='<input type="text" class="inputSmall row4" onClick="DeleteCell(4)" name="t4[]" value="'+getTimer()+'"  readonly>';  
                        var x = document.getElementById("TableTos").rows[countClick4+y4].cells[7].innerHTML='<input type="text" class="inputSmall" name="avg[]" value="'+formatavgDiferentResult+'"  readonly>';  
                        var x = document.getElementById("TableTos").rows[countClick4+y4].cells[8].innerHTML='<input type="text" class="inputSmall" name="min[]" value="'+formatminDiferentResult+'"  readonly>';
                        arrayAvg4.push(formatavgDiferentResult);
                        arrayMin4.push(formatminDiferentResult); 
                    }
                    console.log(arrayAvg4);
                    ListAvgDiferentResult.splice(countClick4-1,1,avgDiferentResult.toFixed(2));
                }else{
                    inputTos5();
                }
            }
            function inputTos5()
            {
                countClick5++
                if (countClick5<=countProcess) {
                        arr5.push(toSeconds(getTimer()));
                    //search avg diferent
                        avgDiferentResult = 0;
                        arrDifferent5.push(difference);
                        avgDiferentResult = Math.floor((arrDifferent1[countClick5-1]+arrDifferent2[countClick5-1]+arrDifferent3[countClick5-1]+arrDifferent4[countClick5-1]+arrDifferent5[countClick5-1])/5);
                        formatavgDiferentResult = [
                                Math.floor(avgDiferentResult / 6000), // an minute has 6000 mili seconds
                                Math.floor((avgDiferentResult % 6000) / 100), // a seconds has 100 mili seconds
                                avgDiferentResult % 100
                            ];
                            // 0 padding and concatation
                            formatavgDiferentResult = formatavgDiferentResult.map(function(v) {
                                return v < 10 ? '0' + v : v;
                            }).join(':');
                            //summary avg ct
                                var sumArrayCT=0;
                                arrayCT[countClick5-1]=avgDiferentResult;
                                for (let i = 0; i < arrayCT.length; i++) {
                                    sumArrayCT += Math.round(arrayCT[i]);
                                }
                                //for Cycle Time + allowance 15%
                                    var CTAllowance=Math.round(sumArrayCT*1.15);
                                    
                                // //for capacity / hour
                                    capaPerHour = Math.floor(3600/(CTAllowance/100));
                                    arrCapacity=capaPerHour;
                                    hisCapaPerHour5=capaPerHour+" "+process_unit;
                                    document.getElementById("CapaPerHour").value = capaPerHour+" "+process_unit;
                                formatSumArrayCT = [
                                    Math.floor(sumArrayCT / 6000), // an minute has 6000 mili seconds
                                    Math.floor((sumArrayCT % 6000) / 100), // a seconds has 100 mili seconds
                                    sumArrayCT % 100
                                ];
                                // 0 padding and concatation
                                formatSumArrayCT = formatSumArrayCT.map(function(v) {
                                    return v < 10 ? '0' + v : v;
                                }).join(':');
                                arrSumArrayCT=formatSumArrayCT; 
                                hisCTSummary5=formatSumArrayCT+" Sec";
                                document.getElementById("CTSummary").value = formatSumArrayCT+" Sec";
                    //search min difrene
                        minDiferentResult = 0;
                        minDiferentResult = Math.min(arrDifferent1[countClick5-1],arrDifferent2[countClick5-1],arrDifferent3[countClick5-1],arrDifferent4[countClick5-1],arrDifferent5[countClick5-1]);
                        formatminDiferentResult = [
                                Math.floor(minDiferentResult / 6000), // an minute has 6000 mili seconds
                                Math.floor((minDiferentResult % 6000) / 100), // a seconds has 100 mili seconds
                                minDiferentResult % 100
                            ];
                            // 0 padding and concatation
                            formatminDiferentResult = formatminDiferentResult.map(function(v) {
                                return v < 10 ? '0' + v : v;
                            }).join(':');
                        //summary avg ct
                            var sumMinCT=0;
                            arrayMinCT[countClick5-1]=minDiferentResult;
                            for (let i = 0; i < arrayMinCT.length; i++) {
                                sumMinCT += Math.round(arrayMinCT[i]);
                            }
                            formatSumMinCT = [
                                Math.floor(sumMinCT / 6000), // an minute has 6000 mili seconds
                                Math.floor((sumMinCT % 6000) / 100), // a seconds has 100 mili seconds
                                sumMinCT % 100
                            ];
                            // 0 padding and concatation
                            formatSumMinCT = formatSumMinCT.map(function(v) {
                                return v < 10 ? '0' + v : v;
                            }).join(':');
                            arrSumMinCT=formatSumMinCT; 
                            hisSumBp5=formatSumMinCT+" Sec";
                            document.getElementById("sumBP").value = formatSumMinCT+" Sec";
                        //summary CTAllowance
                            formatCTAllowance = [
                                    Math.floor(CTAllowance / 6000), // an minute has 6000 mili seconds
                                    Math.floor((CTAllowance % 6000) / 100), // a seconds has 100 mili seconds
                                    CTAllowance % 100
                                ];
                                // 0 padding and concatation
                                formatCTAllowance = formatCTAllowance.map(function(v) {
                                    return v < 10 ? '0' + v : v;
                                }).join(':');
                                arrCTAllowance=formatCTAllowance; 
                                hisCTAllowance5=formatCTAllowance+" Sec";
                                document.getElementById("CTAllowance").value = formatCTAllowance+" Sec";
                        //total time study 5
                            var tt5=0;
                            arraySumdif5.push(difference);
                            for (let i = 0; i < arraySumdif5.length; i++) {
                                tt5 += Math.round(arraySumdif5[i]);
                            }
                                formatSumTT = [
                                    Math.floor(tt5 / 6000), // an minute has 6000 mili seconds
                                    Math.floor((tt5 % 6000) / 100), // a seconds has 100 mili seconds
                                    tt5 % 100
                                ];
                                formatSumTT = formatSumTT.map(function(v) {
                                    return v < 10 ? '0' + v : v;
                                }).join(':');
                            idt5.value=formatSumTT;
                    if (countClick5==1) {
                        var x = document.getElementById("TableTos").rows[0].cells[6].innerHTML='<input type="text" class="inputSmall row5" onClick="DeleteCell(5)" name="ct5[]" value="'+diferent+'"  readonly>';  
                        var x = document.getElementById("TableTos").rows[1].cells[4].innerHTML='<input type="text" class="inputSmall row5" onClick="DeleteCell(5)" name="t5[]" value="'+getTimer()+'"  readonly>';  
                        var x = document.getElementById("TableTos").rows[0].cells[7].innerHTML='<input type="text" class="inputSmall" name="avg[]" value="'+formatavgDiferentResult+'"  readonly>';  
                        var x = document.getElementById("TableTos").rows[0].cells[8].innerHTML='<input type="text" class="inputSmall" name="min[]" value="'+formatminDiferentResult+'"  readonly>'; 
                        arrayAvg5.push(formatavgDiferentResult);
                        arrayMin5.push(formatminDiferentResult);  
                    }else if(countClick5==2){
                        var x = document.getElementById("TableTos").rows[2].cells[6].innerHTML='<input type="text" class="inputSmall row5" onClick="DeleteCell(5)" name="ct5[]" value="'+diferent+'"  readonly>';  
                        var x = document.getElementById("TableTos").rows[3].cells[4].innerHTML='<input type="text" class="inputSmall row5" onClick="DeleteCell(5)" name="t5[]" value="'+getTimer()+'"  readonly>';  
                        var x = document.getElementById("TableTos").rows[2].cells[7].innerHTML='<input type="text" class="inputSmall" name="avg[]" value="'+formatavgDiferentResult+'"  readonly>';  
                        var x = document.getElementById("TableTos").rows[2].cells[8].innerHTML='<input type="text" class="inputSmall" name="min[]" value="'+formatminDiferentResult+'"  readonly>'; 
                        arrayAvg5.push(formatavgDiferentResult);
                        arrayMin5.push(formatminDiferentResult);   
                    }else{
                        y5++
                        var x = document.getElementById("TableTos").rows[countClick5+y5].cells[6].innerHTML='<input type="text" name="ct5[]" class="inputSmall row5" onClick="DeleteCell(5)" value="'+diferent+'"  readonly>';  
                        var x = document.getElementById("TableTos").rows[countClick5+y5+1].cells[4].innerHTML='<input type="text" name="t5[]" class="inputSmall row5" onClick="DeleteCell(5)" value="'+getTimer()+'"  readonly>';  
                        var x = document.getElementById("TableTos").rows[countClick5+y5].cells[7].innerHTML='<input type="text" name="avg[]" class="inputSmall" value="'+formatavgDiferentResult+'"  readonly>';  
                        var x = document.getElementById("TableTos").rows[countClick5+y5].cells[8].innerHTML='<input type="text" name="min[]" class="inputSmall" value="'+formatminDiferentResult+'"  readonly>';
                        arrayAvg5.push(formatavgDiferentResult);
                        arrayMin5.push(formatminDiferentResult);  
                    }
                    ListAvgDiferentResult.splice(countClick5-1,1,avgDiferentResult.toFixed(2));
                }else{
                    stop();
                }
            }
            function SpliTos() {
                process_unit = document.getElementById("process_unit").value;
                countClick++
                countProcess = document.getElementById("countProcess").value;
                getDiferent();
                if (countProcess == "") {
                    alert("Data No. Process Must be Field!");
                    document.getElementById("countProcess").setAttribute("style","background: rgb(223, 82, 82);color: white;");
                    document.getElementById("countProcess").focus(); 
                    countClick=0;
                }else{
                    stopwatchE2.value=getTimer();
                    if (countClick<=countProcess) {// column 1
                        inputTOS1();
                    }else{
                        inputTOS2();
                    }
                }
            }
            function ChangeElement(i)
            {

                var elementValue = i.value;
                const splitElement = elementValue.split(" ");
                var elementTime=splitElement[0];
                var rowTable=splitElement[1];
                ListElementTime.splice(rowTable-1,1,elementTime);
            }
            function reload()
            {
                location.reload();
            }
            function DeleteCell(x)
            {
                stop();
                var nextIndex = x+1;
                var nextItem = document.getElementsByClassName('row'+nextIndex);
                if (x==5) {
                    if (confirm('Are you sure want to delete it?')) {
                        // Save it!
                        document.querySelectorAll('.row'+x).forEach(function(a) {
                            a.remove();
                        })
                        document.getElementById("CTSummary").value = hisCTSummary4;
                        document.getElementById("sumBP").value = hisSumBp4;
                        document.getElementById("CTAllowance").value = hisCTAllowance4;
                        document.getElementById("CapaPerHour").value = hisCapaPerHour4;
                        document.getElementById("idt5").value = "";
                        for (let i = 0; i < arrayAngka.length; i++) {
                            var x = document.getElementById("TableTos").rows[arrayAngka[i]].cells[7].innerHTML='<input type="text" class="inputSmall" name="avg[]" value="'+arrayAvg4[i]+'"  readonly>';  
                            var x = document.getElementById("TableTos").rows[arrayAngka[i]].cells[8].innerHTML='<input type="text" class="inputSmall" name="min[]" value="'+arrayMin4[i]+'"  readonly>'; 
                        }
                        
                    } else {
                        // Do nothing!
                    }
                    
                }else{
                    if (nextItem.length > 0) {
                        alert("Cant delete this item!");
                    }else{
                        if (confirm('Are you sure want to delete it?')) {
                            // Save it!
                            document.querySelectorAll('.row'+x).forEach(function(a) {
                                a.remove();
                            })
                            if (x==4) {
                                document.getElementById("CTSummary").value = hisCTSummary3;
                                document.getElementById("sumBP").value = hisSumBp3;
                                document.getElementById("CTAllowance").value = hisCTAllowance3;
                                document.getElementById("CapaPerHour").value = hisCapaPerHour3;
                                document.getElementById("idt4").value = "";
                                for (let i = 0; i < arrayAngka.length; i++) {
                                    var x = document.getElementById("TableTos").rows[arrayAngka[i]].cells[7].innerHTML='<input type="text" class="inputSmall" name="avg[]" value="'+arrayAvg3[i]+'"  readonly>';  
                                    var x = document.getElementById("TableTos").rows[arrayAngka[i]].cells[8].innerHTML='<input type="text" class="inputSmall" name="min[]" value="'+arrayMin3[i]+'"  readonly>'; 
                                }
                            }else if (x==3) {
                                document.getElementById("CTSummary").value = hisCTSummary2;
                                document.getElementById("sumBP").value = hisSumBp2;
                                document.getElementById("CTAllowance").value = hisCTAllowance2;
                                document.getElementById("CapaPerHour").value = hisCapaPerHour2;
                                document.getElementById("idt3").value = "";
                                for (let i = 0; i < arrayAngka.length; i++) {
                                    var x = document.getElementById("TableTos").rows[arrayAngka[i]].cells[7].innerHTML='<input type="text" class="inputSmall" name="avg[]" value="'+arrayAvg2[i]+'"  readonly>';  
                                    var x = document.getElementById("TableTos").rows[arrayAngka[i]].cells[8].innerHTML='<input type="text" class="inputSmall" name="min[]" value="'+arrayMin2[i]+'"  readonly>'; 
                                }
                            }else{
                                document.getElementById("CTSummary").value = "";
                                document.getElementById("sumBP").value = "";
                                document.getElementById("CTAllowance").value = "";
                                document.getElementById("CapaPerHour").value = "";
                                document.getElementById("idt2").value = "";
                                for (let i = 0; i < arrayAngka.length; i++) {
                                    var x = document.getElementById("TableTos").rows[arrayAngka[i]].cells[7].innerHTML='<input type="text" class="inputSmall" name="avg[]" value=""  readonly>';  
                                    var x = document.getElementById("TableTos").rows[arrayAngka[i]].cells[8].innerHTML='<input type="text" class="inputSmall" name="min[]" value=""  readonly>'; 
                                }
                            }
                        } else {
                            // Do nothing!
                        }
                    }
                }
            }
            function resetFormInput()
            {
                $("#tableTOS").empty();
                document.getElementById('stopwatch2').value = '';
                document.getElementById('CTSummary').value = '';
                document.getElementById('sumBP').value = '';
                document.getElementById('CTAllowance').value = '';
                document.getElementById('CapaPerHour').value = '';
                document.getElementById('idt1').value = '';
                document.getElementById('idt2').value = '';
                document.getElementById('idt3').value = '';
                document.getElementById('idt4').value = '';
                document.getElementById('idt5').value = '';
                stop();
                countClick=0;
                countClick2=0;
                countClick3=0;
                countClick4=0;
                countClick5=0;
                y2=0;
                y3=0;
                y4=0;
                y5=0;
                arrDifferent1.length = 0;
                arrDifferent2.length = 0;
                arrDifferent3.length = 0;
                arrDifferent4.length = 0;
                arrDifferent5.length = 0;
                arrayMinCT.length = 0;
                arrayCT.length = 0;
                arr1.length = 0;
                arr2.length = 0;
                arr3.length = 0;
                arr4.length = 0;
                arr5.length = 0;
                avg.length = 0;
                avgDiferent.length = 0;
                ListElementTime.length = 0;
                ListAvgDiferentResult.length = 0;


            }
            
                $('#formInputTOS').on('submit', function(event){
                    event.preventDefault();
                    var process = document.getElementById('process').value;
                    var style = document.getElementById('style').value;
                    var gender = document.getElementById('gender').value; 
                    var area = document.getElementById('area').value;
                    var observer = document.getElementById('observer').value;
                    var video = document.getElementById('input-tag').value;
                    var name_element = document.getElementsByName('name_element').values;

                    if (process==""||style==""||gender==""||area=="--select area--"||observer==""||video=="") {
                        alert("All data is not filled");
                        document.getElementById("process").setAttribute("style","background: rgb(223, 82, 82);color: white;");
                        document.getElementById("style").setAttribute("style","background: rgb(223, 82, 82);color: white;");
                        document.getElementById("gender").setAttribute("style","background: rgb(223, 82, 82);color: white;");
                        document.getElementById("area").setAttribute("style","background: rgb(223, 82, 82);color: white;");
                        document.getElementById("observer").setAttribute("style","background: rgb(223, 82, 82);color: white;");
                        document.getElementById("input-tag").setAttribute("style","background: rgb(223, 82, 82);color: white;");
                    }else{
                        $.ajax({
                                url:"{{ route('ie_base.tos.save_tos') }}",
                                method:"POST",
                                data:new FormData(this),
                                dataType:'JSON',
                                contentType: false,
                                cache: false,
                                processData: false,
                                beforeSend:function(){
                                $('#success').empty();
                                    document.getElementById("loading").style.visibility = "visible";
                                },
                                uploadProgress:function(event, position, total, percentComplete)
                                {
                                    $('.progress-bar').text(percentComplete + '%');
                                    $('.progress-bar').css('width', percentComplete + '%');
                                },
                                success:function(data)
                                {
                                    if(data.errors)
                                    {
                                        $('.progress-bar').text('0%');
                                        $('.progress-bar').css('width', '0%');
                                        $('#success').html('<span class="text-danger"><b>'+data.errors+'</b></span>');
                                        document.getElementById("loading").style.visibility = "hidden";
                                    }
                                    if(data.success)
                                    {
                                        $('.progress-bar').text('Uploaded');
                                        $('.progress-bar').css('width', '100%');
                                        $('#success').html('<span class="text-success"><b>'+data.success+'</b></span><br /><br />');
                                        document.getElementById("loading").style.visibility = "hidden";
                                        document.getElementById("formInputTOS").reset();
                                        reload()
                                    }
                                }
                            })
                    }
                });
                $('#formUpdateTOS').on('submit', function(event){
                    event.preventDefault();
                    $.ajax({
                        url:"{{ route('ie_base.tos.update_tos') }}",
                        method:"POST",
                        data:new FormData(this),
                        dataType:'JSON',
                        contentType: false,
                        cache: false,
                        processData: false,
                        success:function(data)
                        {
                            if(data.success)
                            {
                                alert(data.success);
                                location.reload();
                            }
                        }
                    })
                });
</script>
{{-- keyevent --}}
<script>
    // document.body.onkeyup = function(e){
    //     if(e.keyCode == 80){
    //         pause();
    //     }
    //     if(e.keyCode == 32){
    //         SpliTos();
    //     }
    //     if(e.keyCode == 82){
    //         resetFormInput();
    //     }
    //     if(e.keyCode == 83){
    //         stop();
    //     }
    // }
</script>
<script>
    function filledInput(i)
    {
        document.getElementById(i).setAttribute('style','background: rgb(255, 255, 255);color: black;')
    }
</script>

