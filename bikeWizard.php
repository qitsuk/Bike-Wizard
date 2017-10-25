<?php
/*
Plugin Name: bikeWizard
Plugin URI: http://evang.dk/
Description: A wizard to pick the right Bullit bike that fits your needs
Version: 0.2
Author: Cecilie Karlsson
Author URI: http://evang.dk
License: GPL
*/
function showBikeWizard()
{

    ?>
        <script type="text/javascript">

            step = 0;
            var totalPrice = 0;
            var colour = { name: "none selected", image: ""};
            var frame = { name: "nothing", price: 0, image: "" };
            var driveTrain = { name: "none selected", price: 0 };
            var handlebarRiser = { name: "", price: 0, image: "" };
            var handlebarFlat = { name: "", price: 0, image: "" };
            var handlebarCruiser = { name: "", price: 0, image: "" };
            var seatpost = { name: "", price: 0, image: "" };
            var saddleRaceWhite = { name: "", price: 0, image: "" };
            var saddleRaceBlack = { name: "", price: 0, image: "" };
            var saddleB17Brown = { name: "", price: 0, image: "" };
            var saddleB17Black = { name: "", price: 0, image: "" };
            var saddleB67Brown = { name: "", price: 0, image: "" };
            var saddleB67Black = { name: "", price: 0, image: "" };
            var customize = [];

            var damperKit = { name: 'Damper Kit', colour: '', price: 120, image: 'http://shop.larryvsharry.com/skin/frontend/lvsh/lvsh/images/alubox_1.png' };
            var canopy = { name: 'Canopy', colour: '', price: 449, image: "http://shop.larryvsharry.com/media/catalog/product/cache/1/image/9df78eab33525d08d6e5fb8d27136e95/d/o/dogcage_1.png"};
            var honeycombBoard = { name: 'Honeycomb Board (HCB)', colour: '', price: 188, image: 'http://shop.larryvsharry.com/skin/frontend/lvsh/lvsh/images/honeycompboard.png' };
            var convoyBox = { name: 'Convey Box', colour: '', price: 833, image: 'http://shop.larryvsharry.com/media/catalog/product/cache/1/image/9df78eab33525d08d6e5fb8d27136e95/7/b/7b31bee8-1a42-45ba-b713-d3bd4086d8d9_lan.png' };
            var aluminumBox = { name: 'Aluminum Box', colour: '', price: 341, image: 'http://shop.larryvsharry.com/media/catalog/product/cache/1/image/9df78eab33525d08d6e5fb8d27136e95/a/l/alubox.png' };
            var plasticBox = { name: 'Plastic Box', colour: '', price: 43, image: 'http://shop.larryvsharry.com/media/catalog/product/cache/1/image/9df78eab33525d08d6e5fb8d27136e95/p/l/plastbox.png' };
            var bbx = { name: 'BBX', colour: '', price: 354, image: '' };
            var billBoard = { name: 'Billboard', colour: '', price: 69, image: '' };
            var accessories = [];


            var dynamo = { name: 'Dynamo 20" Front Wheel (Alfine/Alex DM24)', price: 166 };
            var reeLights = { name: 'Reelights', price: 76 };
            var chromoKickstand = { name: 'Chromo Kickstand', price: 102 };
            var abus5400 = { name: 'Abus 5400 Granite U-Lock', price: 145 };
            var abusBordo = { name: 'Abus Bordo 6500 Granite X Plus', price: 131 };
            var abus9100 = { name: 'Abus 9100 Ivy Chain Lock', price: 131 };
            var abusBordoPlus = { name: 'Abus Bordo + Detecto 8077 Alarm', price: 319};
            var extras = [];

            //region Frame option vars
            var fullBike = { id: 'Fullbike', text:
                "<div class='col-sm-4 ' >" +
                "<img src='http://shop.larryvsharry.com/skin/frontend/lvsh/lvsh/images/homepage-full-bike-icon.png' class='imgbikewizard' >" +
                "       <div class='radio'>" +
                "           <label><input type='radio' id='fullBikeRadio' name='optradio' value='1438'>Fullbike    €1438</label> " +
                "       </div> " +
                "Full Bike\n" +
                "If you are buying a Full bike, everything to ride safely and securely is included; reflectors complying with EU regulations, front and rear mudguards to keep that gritty spray away and an Abus, insurance approved ring lock." +
                "</div>", price: 1438 };
            var frameKit = { id: 'Framekit', text: " <div class='col-sm-4'>" +
                "<img src='http://shop.larryvsharry.com/skin/frontend/lvsh/lvsh/images/homepage-frame-kit-icon.png' class='imgbikewizard'>" +
                "        <div class='radio'>" +
                "           <label><input type='radio' value='1438' id='frameKitRadio' name='optradio'>Framekit    €1438</label> " +
                "          </div> " +
                "Framekit\n" +
                "If you have bought a Bullitt frame, here's what to expect; An aluminium frame, chromoly steel fork, steering rod and fittings, FSA 1 1/8 headsets, tapered headset and spacers and a sturdy kickstand. We also include our newly developed, interchangeable dropouts. Please specify whether you require dropouts for internal or external gears, or horizontal singlespeed dropouts with your order." +
                "   </div>", price: 1438 };
            var eBullitt = { id: 'Steps EBullit Full Bike', text: "<div class='col-sm-4'>" +
                "<img src='http://shop.larryvsharry.com/media/catalog/product/cache/1/image/9df78eab33525d08d6e5fb8d27136e95/e/b/ebullit_drivetrain2_test_3.png' class='imgbikewizard'>" +
                "       <div class='radio'>" +
                "           <label><input type='radio' value='3642' id='eBullittRadio' name='optradio'>Steps EBullit Full Bike    $3642</label> " +
                "       </div>" +
                "The STePS eBullitt system includes a 250W, 36-volt electric drive unit, or motor, that will help get you up to speed, but cuts out at 15.5mph (25km/h). You can go faster than that if you want but any speeds over 15.5mph have to be generated by either pedalling or gravity alone. The drive unit produces a maximum torque of 50nm and weighs 3.2kg, making it one of the lightest on the market." +
                "   </div> ", price: 4261 };
            //endregion

            //region colour option vars

            //endregion

            function wizardButtonClicked()
            {
                step ++;
                switch(step) {
                    case 0:
                        document.getElementById("bike-wizard-progress-bar").style.width = '0%';
                        document.getElementById("bike-wizard-text-field").innerHTML = "welcome to the bike wizard.";
                        console.log(step);
                        break;
                    case 1:
                        updateProgressBar('10%');
                        //document.getElementById("bike-wizard-progress-bar").style.width = '10%';
                        document.getElementById("bike-wizard-text-field").innerHTML =
                            "<div class='wrapper'><h1> Step 1 - Choose Your Bike</h1> " + fullBike.text + frameKit.text + eBullitt.text + "</div> ";
                        console.log(step);
                        console.log(totalPrice);
                        break;
                    case 2:
                        if (jQuery("#fullBikeRadio").is(':checked')) {
                            frame.name = "Fullbike";
                            frame.price = 1438;
                            frame.image = 'http://shop.larryvsharry.com/skin/frontend/lvsh/lvsh/images/homepage-full-bike-icon.png';
                        } else if (jQuery("#frameKitRadio").is(':checked')) {
                            frame.name = "Framekit";
                            frame.price = 1438;
                            frame.image = 'http://shop.larryvsharry.com/skin/frontend/lvsh/lvsh/images/homepage-frame-kit-icon.png';
                        } else if (jQuery("#eBullittRadio").is(':checked')) {
                            frame.name = "Steps EBullit Full Bike";
                            frame.price += 3642;
                            frame.image = 'http://shop.larryvsharry.com/media/catalog/product/cache/1/image/9df78eab33525d08d6e5fb8d27136e95/e/b/ebullit_drivetrain2_test_3.png';
                        }
//                        else if (!jQuery("#fullBikeRadio").is(':checked') && !jQuery("#frameKitRadio").is(':checked') && !jQuery("#eBullittRadio").is(':checked')) {
//                            alert('You have to pick a frame. No frame, no cake!');
//                        }
                        //document.getElementById("bike-wizard-progress-bar").style.width = '20%';
                        updateProgressBar('20%');
                        document.getElementById("bike-wizard-text-field").innerHTML =
                            "<div class='wrapper'>" +
                            "   <h1> Step 2 - Choose Your colour</h1>" +
                            " <div class='col-sm-4'>" +
                            "    <div class='radio'>" +
                           " <img src='http://shop.larryvsharry.com/media/catalog/product/cache/1/thumbnail/9df78eab33525d08d6e5fb8d27136e95/c/i/circle-classic_1.png' class='imgcolourbikewizard'> " +
                            "       <label><input type='radio' id='classicRadio' name='optradio'>Classic</label> " +
                            "   </div> "+
                            "   <div class='radio'>" +
                            " <img src='http://shop.larryvsharry.com/media/catalog/product/cache/1/thumbnail/9df78eab33525d08d6e5fb8d27136e95/c/i/circle-race_1_1.png' class='imgcolourbikewizard'> " +
                            "       <label><input type='radio' id='raceRadio' name='optradio'>Race</label> " +
                            "   </div> " +
                            "   <div class='radio'>" +
                            " <img src='http://shop.larryvsharry.com/media/catalog/product/cache/1/thumbnail/9df78eab33525d08d6e5fb8d27136e95/p/e/pepper_color.png' class='imgcolourbikewizard'> " +
                            "       <label><input type='radio' id='pepperRadio' name='optradio'>Pepper</label>" +
                            "   </div> " +
                            " </div>" +
                            " <div class='col-sm-4'>" +
                            "   <div class='radio'>" +
                            " <img src='http://shop.larryvsharry.com/media/catalog/product/cache/1/thumbnail/9df78eab33525d08d6e5fb8d27136e95/s/u/submarine_color.png' class='imgcolourbikewizard'> " +
                            "       <label><input type='radio' id='submarineRadio' name='optradio'>Submarine</label>" +
                            "   </div> " +
                            "   <div class='radio'>" +
                            " <img src='http://shop.larryvsharry.com/media/catalog/product/cache/1/thumbnail/9df78eab33525d08d6e5fb8d27136e95/c/i/circle-bluebird_1.png' class='imgcolourbikewizard'> " +
                            "       <label><input type='radio' id='bluebirdRadio' name='optradio'>Bluebird</label>" +
                            "   </div> " +
                            "   <div class='radio'>" +
                            " <img src='http://shop.larryvsharry.com/media/catalog/product/cache/1/thumbnail/9df78eab33525d08d6e5fb8d27136e95/c/i/circle-generic_2.png' class='imgcolourbikewizard'> " +
                            "       <label><input type='radio' id='milkplusRadio' name='optradio'>Milk Plus</label>" +
                            "   </div> " +
                            " </div>" +
                            " <div class='col-sm-4'>" +
                            "   <div class='radio'>" +
                            " <img src='http://shop.larryvsharry.com/media/catalog/product/cache/1/thumbnail/9df78eab33525d08d6e5fb8d27136e95/c/i/circle-clockwork_1.png' class='imgcolourbikewizard'> " +

                            "       <label><input type='radio' id='clockworkRadio' name='optradio'>Clockwork</label>" +
                            "   </div> " +
                            "   <div class='radio'>" +
                            " <img src='http://shop.larryvsharry.com/media/catalog/product/cache/1/thumbnail/9df78eab33525d08d6e5fb8d27136e95/c/i/circle-lizzard-king_1.png' class='imgcolourbikewizard'> " +

                            "       <label><input type='radio' name='optradio' id='lizzardKingRadio' >Lizardking</label>" +
                            "   </div> " +
                            "   <div class='radio'>" +
                            " <img src='http://shop.larryvsharry.com/media/catalog/product/cache/1/thumbnail/9df78eab33525d08d6e5fb8d27136e95/c/i/circle-raw_1.png' class='imgcolourbikewizard'> " +

                            "       <label><input type='radio' name='optradio' id='råRadio'>Rå</label>" +
                            "   </div> " +
                            " </div>" +
                            "</div>";
                        console.log(step);
                        console.log(totalPrice);
                        break;
                    case 3:
                        if (jQuery("#classicRadio").is(':checked')) {
                            colour.name = "Classic";
                            colour.image = 'http://shop.larryvsharry.com/media/catalog/product/cache/1/thumbnail/9df78eab33525d08d6e5fb8d27136e95/c/i/circle-classic_1.png';
                        } else if (jQuery("#raceRadio").is(':checked')) {
                            colour.name = "Race";
                            colour.image = 'http://shop.larryvsharry.com/media/catalog/product/cache/1/thumbnail/9df78eab33525d08d6e5fb8d27136e95/c/i/circle-race_1_1.png';
                        } else if (jQuery("#pepperRadio").is(':checked')) {
                            colour.name = "Pepper";
                            colour.image = 'http://shop.larryvsharry.com/media/catalog/product/cache/1/thumbnail/9df78eab33525d08d6e5fb8d27136e95/p/e/pepper_color.png';
                        } else if (jQuery("#submarineRadio").is(':checked')) {
                            colour.name = "Submarine";
                            colour.image = 'http://shop.larryvsharry.com/media/catalog/product/cache/1/thumbnail/9df78eab33525d08d6e5fb8d27136e95/s/u/submarine_color.png';
                        } else if (jQuery("#bluebirdRadio").is(':checked')) {
                            colour.name = "Bluebird";
                            colour.image = 'http://shop.larryvsharry.com/media/catalog/product/cache/1/thumbnail/9df78eab33525d08d6e5fb8d27136e95/c/i/circle-bluebird_1.png';
                        } else if (jQuery("#milkplusRadio").is(':checked')) {
                            colour.name = "Milk Plus";
                            colour.image = 'http://shop.larryvsharry.com/media/catalog/product/cache/1/thumbnail/9df78eab33525d08d6e5fb8d27136e95/c/i/circle-generic_2.png';
                        } else if (jQuery("#clockworkRadio").is(':checked')) {
                            colour.name = "Clockwork";
                            colour.image = 'http://shop.larryvsharry.com/media/catalog/product/cache/1/thumbnail/9df78eab33525d08d6e5fb8d27136e95/c/i/circle-clockwork_1.png';
                        } else if (jQuery("#lizzardKingRadio").is(':checked')) {
                            colour.name = "Lizzard King";
                            colour.image = 'http://shop.larryvsharry.com/media/catalog/product/cache/1/thumbnail/9df78eab33525d08d6e5fb8d27136e95/c/i/circle-lizzard-king_1.png';
                        } else if (jQuery("#råRadio").is(':checked')) {
                            colour.name = "Rå";
                            colour.image = 'http://shop.larryvsharry.com/media/catalog/product/cache/1/thumbnail/9df78eab33525d08d6e5fb8d27136e95/c/i/circle-raw_1.png';
                        }
                        //document.getElementById("bike-wizard-progress-bar").style.width = '30%';
                        updateProgressBar('30%');
                        document.getElementById("bike-wizard-text-field").innerHTML =
                            "<div class='wrapper'>" +
                            "   <h1> Step 3 - Drive Train</h1>" +

                            "<div class='col-sm-6'>" +

                            "       <div class='radio'>" +
                            "           <label><input type='radio' id='singleRadio' name='optradio'>SINGLESPEED COMPONENT GROUP    +€746.00</label> " +
                            "       </div> "+
                            "       <div class='radio'>" +
                            "           <label><input type='radio' id='nexus7Radio' name='optradio'>NEXUS 7 COMPONENT GROUP    +€688.00</label> " +
                            "       </div> " +
                            "       <div class='radio'>" +
                            "           <label><input type='radio' id='alfine8Radio' name='optradio'>ALFINE 8 COMPONENT GROUP    +€1,037.00</label>" +
                            "       </div> " +
                            "       <div class='radio'>" +
                            "        <label><input type='radio' id='alfine82Radio' name='optradio'>ALFINE 8 GATES COMPONENT GROUP    +€1,322.50</label>" +
                            "       </div> " +
                            "</div>" +

                            "<div class='col-sm-6'>" +
                            "   <div class='radio'>" +
                            "       <label><input type='radio' id='alfineDIRadio' name='optradio'>ALFINE DI2 11/GATES COMPONENT GROUP    +€2,024.00</label>" +
                            "   </div> " +
                            "   <div class='radio'>" +
                            "       <label><input type='radio' id='deoreRadio' name='optradio'>DEORE 20 COMPONENT GROUP      +€1,037.00</label>" +
                            "   </div> " +
                            "   <div class='radio'>" +
                            "       <label><input type='radio' id='xtRadio' name='optradio'>XT 22 COMPONENT GROUP    +€1,699.00</label>" +
                            "   </div> " +
                            "</div>" +
                            "<br>" +
                            "<br>" +
                            "<div class='small-12 columns tablecontent'><h2>Model comparison chart</h2>\n" +
                            "<button type='button' class='btn btn-info' data-toggle='collapse' data-target='#demo'>Click here to show comparison chart</button>" +
                             "<div id='demo' class='collapse'>" +
                            "<table  class='table table-striped'>\n" +
                            "<tbody>\n" +
                            "<tr>\n" +
                            "<td></td>\n" +
                            "<td style=\"width: 15px;\"></td>\n" +
                            "<td>\n" +
                            "<h4>Nexus 7</h4>\n" +
                            "</td>\n" +
                            "<td>\n" +
                            "<h4>Alfine 8</h4>\n" +
                            "</td>\n" +
                            "<td>\n" +
                            "<h4>Alfine 11 Di2/Gates Drive</h4>\n" +
                            "</td>\n" +
                            "</tr>\n" +
                            "<tr>\n" +
                            "<td><strong>Drivetrain</strong></td>\n" +
                            "<td></td>\n" +
                            "<td>7 speed internal Nexus hub</td>\n" +
                            "<td>8 speed internal Alfine hub</td>\n" +
                            "<td>11 speed Di2 Alfine/Gates CDX</td>\n" +
                            "</tr>\n" +
                            "<tr>\n" +
                            "<td><strong>Wheels</strong></td>\n" +
                            "<td></td>\n" +
                            "<td>Alex Rims dm24/Novatec hubs</td>\n" +
                            "<td>Alex Rims dm24 /Alfine 8 hub</td>\n" +
                            "<td>Alex Rims Supra/Alfine 11 hub</td>\n" +
                            "</tr>\n" +
                            "<tr>\n" +
                            "<td><strong>Tyres</strong></td>\n" +
                            "<td></td>\n" +
                            "<td>Schwalbe Marathon 1.75″</td>\n" +
                            "<td>Schwalbe Marathon 1.75″</td>\n" +
                            "<td>Schwalbe Marathon Supreme 1.60″</td>\n" +
                            "</tr>\n" +
                            "<tr>\n" +
                            "<td><strong>Finishing Kit</strong></td>\n" +
                            "<td></td>\n" +
                            "<td>Alu seatpost, stem and riserbars</td>\n" +
                            "<td>Alu seatpost, stem and riserbars</td>\n" +
                            "<td>Alu seatpost, stem and riserbars</td>\n" +
                            "</tr>\n" +
                            "<tr>\n" +
                            "<td><strong>Pedals</strong></td>\n" +
                            "<td></td>\n" +
                            "<td>Wellgo flat pedals</td>\n" +
                            "<td>Wellgo flat pedals</td>\n" +
                            "<td>Wellgo flat pedals</td>\n" +
                            "</tr>\n" +
                            "<tr>\n" +
                            "<td><strong>Crankset/BB</strong></td>\n" +
                            "<td></td>\n" +
                            "<td>Truvativ/42T chainring<br>\n" +
                            "Truvativ powerspline bb</td>\n" +
                            "<td>Alfine crank/42T chainring<br>\n" +
                            "Hollowtech 2 bb</td>\n" +
                            "<td>Alfine crank/Gates chainring 46T<br>\n" +
                            "Hollowtech 2 bb</td>\n" +
                            "</tr>\n" +
                            "<tr>\n" +
                            "<td><strong>Saddle</strong></td>\n" +
                            "<td></td>\n" +
                            "<td>Velo Racing</td>\n" +
                            "<td>Velo Racing</td>\n" +
                            "<td>Velo Racing</td>\n" +
                            "</tr>\n" +
                            "<tr>\n" +
                            "<td><strong>Brakes</strong></td>\n" +
                            "<td></td>\n" +
                            "<td>Tektro hydraulic disc front/<br>\n" +
                            "back pedal rear brake</td>\n" +
                            "<td>Magura MT5 hydraulic disc<br>\n" +
                            "brakes w 180mm discs</td>\n" +
                            "<td>Magura MT5 hydraulic disc<br>\n" +
                            "brakes w 180mm discs</td>\n" +
                            "</tr>\n" +
                            "</tbody>\n" +
                            "</table>\n" +
                            "<table  class='table table-striped'>\n" +
                            "<tbody>\n" +
                            "<tr>\n" +
                            "<td></td>\n" +
                            "<td style=\"width: 15px;\"></td>\n" +
                            "<td>\n" +
                            "<h4>Deore 20</h4>\n" +
                            "</td>\n" +
                            "<td>\n" +
                            "<h4>XT 22</h4>\n" +
                            "</td>\n" +
                            "<td>\n" +
                            "<h4>Singlespeed</h4>\n" +
                            "</td>\n" +
                            "</tr>\n" +
                            "<tr>\n" +
                            "<td><strong>Drivetrain</strong></td>\n" +
                            "<td></td>\n" +
                            "<td>20 speed/Deore derailleurs/11-32 cassette</td>\n" +
                            "<td>22 speed/XT derailleurs/<br>\n" +
                            "11-42 cassette</td>\n" +
                            "<td>–</td>\n" +
                            "</tr>\n" +
                            "<tr>\n" +
                            "<td><strong>Wheels</strong></td>\n" +
                            "<td></td>\n" +
                            "<td>Alex Rims dm24/Novatec hubs</td>\n" +
                            "<td>Alex Rims Supra/Novatec hubs</td>\n" +
                            "<td>Alex Rims dm24/ Novatec hubs</td>\n" +
                            "</tr>\n" +
                            "<tr>\n" +
                            "<td><strong>Tyres</strong></td>\n" +
                            "<td></td>\n" +
                            "<td>Schwalbe Marathon 1.75″</td>\n" +
                            "<td>Schwalbe Kojak 1.35″</td>\n" +
                            "<td>Schwalbe Marathon 1.75″</td>\n" +
                            "</tr>\n" +
                            "<tr>\n" +
                            "<td><strong>Finishing Kit</strong></td>\n" +
                            "<td></td>\n" +
                            "<td>Alu seatpost, stem and riserbars</td>\n" +
                            "<td>Thomson Trail bar, Elite seatpost, X4 stem and saddleclamp.</td>\n" +
                            "<td>Alu seatpost, stem and riserbar</td>\n" +
                            "</tr>\n" +
                            "<tr>\n" +
                            "<td><strong>Pedals</strong></td>\n" +
                            "<td></td>\n" +
                            "<td>Wellgo flat pedals</td>\n" +
                            "<td>Wellgo flat pedals</td>\n" +
                            "<td>Wellgo flat pedals</td>\n" +
                            "</tr>\n" +
                            "<tr>\n" +
                            "<td><strong>Crankset/BB</strong></td>\n" +
                            "<td></td>\n" +
                            "<td>Deore crank/40,24T chainrings<br>\n" +
                            "Hollowtech II bottom bracket</td>\n" +
                            "<td>XT crank/38,28T chainrings<br>\n" +
                            "Hollowtech II bottom bracket</td>\n" +
                            "<td>Truvativ (42t chainring)</td>\n" +
                            "</tr>\n" +
                            "<tr>\n" +
                            "<td><strong>Saddle</strong></td>\n" +
                            "<td></td>\n" +
                            "<td>Velo Racing</td>\n" +
                            "<td>Velo Racing</td>\n" +
                            "<td>Velo Racing</td>\n" +
                            "</tr>\n" +
                            "<tr>\n" +
                            "<td><strong>Brakes</strong></td>\n" +
                            "<td></td>\n" +
                            "<td>Tektro hydraulic disc<br>\n" +
                            "brakes w 180mm discs</td>\n" +
                            "<td>Shimano Zee hydraulic disc<br>\n" +
                            "brakes w 180mm discs</td>\n" +
                            "<td>Tektro hydraulic disc brakes<br>\n" +
                            "w 180mm discs</td>\n" +
                            "</tr>\n" +
                            "</tbody>\n" +
                            "</table>\n" +
                            "<table  class='table table-striped'>\n" +
                            "<tbody>\n" +
                            "<tr>\n" +
                            "<td></td>\n" +
                            "<td style=\"width: 15px;\"></td>\n" +
                            "<td>\n" +
                            "<h4>Zee 10</h4>\n" +
                            "</td>\n" +
                            "<td>\n" +
                            "<h4>Saint 10</h4>\n" +
                            "</td>\n" +
                            "<td></td>\n" +
                            "</tr>\n" +
                            "<tr>\n" +
                            "<td><strong>Drivetrain</strong></td>\n" +
                            "<td></td>\n" +
                            "<td>10 speed/Zee derailleur/<br>\n" +
                            "11-36t cassette</td>\n" +
                            "<td>10 speed/Saint derailleur/<br>\n" +
                            "11-36t cassette</td>\n" +
                            "<td></td>\n" +
                            "</tr>\n" +
                            "<tr>\n" +
                            "<td><strong>Wheels</strong></td>\n" +
                            "<td></td>\n" +
                            "<td>Alex Rims DM24/ Zee hubs<br>\n" +
                            "(20mm thru axle front)</td>\n" +
                            "<td>Alex Rims Supra/ Saint hubs<br>\n" +
                            "(20mm thru axle)</td>\n" +
                            "<td></td>\n" +
                            "</tr>\n" +
                            "<tr>\n" +
                            "<td><strong>Tyres</strong></td>\n" +
                            "<td></td>\n" +
                            "<td>Schwalbe Marathon 1.75″</td>\n" +
                            "<td>Schwalbe Marathon Supreme 1.60″</td>\n" +
                            "<td></td>\n" +
                            "</tr>\n" +
                            "<tr>\n" +
                            "<td><strong>Finishing Kit</strong></td>\n" +
                            "<td></td>\n" +
                            "<td>Alu seatpost, stem and riserbars</td>\n" +
                            "<td>FSA Carbon bar and seatpost, FSA stem</td>\n" +
                            "<td></td>\n" +
                            "</tr>\n" +
                            "<tr>\n" +
                            "<td><strong>Pedals</strong></td>\n" +
                            "<td></td>\n" +
                            "<td>Wellgo flat pedals</td>\n" +
                            "<td>Wellgo flat pedals</td>\n" +
                            "<td></td>\n" +
                            "</tr>\n" +
                            "<tr>\n" +
                            "<td><strong>Crankset/BB</strong></td>\n" +
                            "<td></td>\n" +
                            "<td>Zee crank/36T chainring<br>\n" +
                            "Hollowtech 2 bb</td>\n" +
                            "<td>Saint crank/36T chainring</td>\n" +
                            "<td></td>\n" +
                            "</tr>\n" +
                            "<tr>\n" +
                            "<td><strong>Saddle</strong></td>\n" +
                            "<td></td>\n" +
                            "<td>Velo Racing</td>\n" +
                            "<td>Velo Racing</td>\n" +
                            "<td></td>\n" +
                            "</tr>\n" +
                            "<tr>\n" +
                            "<td><strong>Brakes</strong></td>\n" +
                            "<td></td>\n" +
                            "<td>Shimano Zee hydraulic disc<br>\n" +
                            "brakes w 203mm discs</td>\n" +
                            "<td>Shimano Saint hydraulic disc<br>\n" +
                            "brakes w 203mm discs</td>\n" +
                            "<td></td>\n" +
                            "</tr>\n" +
                            "</tbody>\n" +
                            "</table>\n" +
                            "</div>" +
                            "</div>" +
                            "" +
                            "</div>";
                        console.log(step);
                        console.log(totalPrice);
                        break ;
                    case 4:
                        updateProgressBar('40%');
                        if (jQuery("#singleRadio").is(':checked')) {
                            driveTrain.name = "SINGLESPEED COMPONENT GROUP";
                            driveTrain.name = 746;
                        } else if(jQuery("#nexus7Radio").is(':checked')) {
                            driveTrain.name  = "NEXUS 7 COMPONENT GROUP";
                            driveTrain.price = 688;
                        } else if(jQuery("#alfine8Radio").is(':checked')) {
                            driveTrain.name = "ALIFINE 8 COMPONENT GROUP";
                            driveTrain.price = 1037;
                        } else if(jQuery("#alfine82Radio").is(':checked')) {
                            driveTrain.name = "ALFINE 8 GATES COMPONENT GROUP";
                            driveTrain.price = 1322.5;
                        } else if(jQuery("#alfineDIRadio").is(':checked')) {
                            driveTrain.name = "ALFINE DI2 11/GATES COMPONENT GROUP";
                            driveTrain.price = 2024;
                        } else if(jQuery("#deoreRadio").is(':checked')) {
                            driveTrain.name = "DEORE 20 COMPONENT GROUP";
                            driveTrain.price = 1037;
                        } else if(jQuery("#xtRadio").is(':checked')) {
                            driveTrain.name = "XT 22 COMPONENT GROUP";
                            driveTrain.prive = 1699;
                        }
                        document.getElementById("bike-wizard-text-field").innerHTML =  "<div class='wrapper'>" +
                            "<h1> Step 4 - Customise</h1>" +
                            "All our models feature powerful, hydraulic disc brake systems for smoother, more controlled stopping. We have purposefully chosen brakes from leading manufacturers Shimano, Magura and Tektro and matched them to the most relevant component groups. For simple aftermarket servicing, we have also ensured our brakes have great brake pad durability and easy aftermarket servicing." +
                            "<br><br>" +
                            " <div class='col-sm-4'>" +
                            "<h3> Handlebars </h3>" +
                            "  <div class='checkbox'> " +
                            "<label><input type='checkbox' id='riserCheck' value=''>Riserbar    +€26.00</label>" +
                            "</div> " +
                            "  <div class='checkbox'> " +
                            "<label><input type='checkbox' id='flatCheck' value=''>Flatbar    +€26.00</label>" +
                            "</div> " +
                            "  <div class='checkbox'> " +
                            "<label><input type='checkbox' id='cruiserCheck' value=''>Cruiser    +€26.00</label>" +
                            "</div>" +
                            "</div> " +
                            " <div class='col-sm-4'>" +
                            "<h3> Seatposts </h3>" +
                            "  <div class='radio'> " +
                            "<label><input type='radio' id='shortRadio' name='optradio' value=''>Short    +€42.00</label>" +
                            "</div> " +
                            "  <div class='radio'> " +
                            "<label><input type='radio' id='longRadio' name='optradio' value=''>Long    +€42.00</label>" +
                            "</div>" +
                            "<p>The Bullitt is a one frame solution, designed to fit the greatest number of people and we have spent years tweaking geometry. A sloping top tube, short back-end and low bottom bracket means great manueveurability. We offer two different seatpost lengths and two different stem lengths to cater for different users and our Easyup Stemlifter means the cockpit can quickly and easily be raised to enable more space in the cargo area.</p>" +
                            "</div> " +
                            " <div class='col-sm-4'>" +
                            "<h3> Saddles </h3>" +
                            "  <div class='checkbox'>" +
                            " <img src='http://shop.larryvsharry.com/media/catalog/product/cache/1/image/9df78eab33525d08d6e5fb8d27136e95/b/l/black_1.png' class='imgbikewizard'> " +

                            "<label><input type='checkbox' id='raceBlackCheck' value=''>Race Black    +€54.00</label>" +
                             "</div> " +
                            "  <div class='checkbox'> " +
                            " <img src='http://shop.larryvsharry.com/media/catalog/product/cache/1/image/9df78eab33525d08d6e5fb8d27136e95/s/a/saddle_white.png' class='imgbikewizard'> " +
                            "<label><input type='checkbox' id='raceWhiteCheck' value=''>Race White    +€54.00</label>" +
                            "</div> " +

                            "  <div class='checkbox'> " +
                            " <img src='http://shop.larryvsharry.com/media/catalog/product/cache/1/image/9df78eab33525d08d6e5fb8d27136e95/s/a/saddle_brown.png' class='imgbikewizard'> " +

                            "<label><input type='checkbox' id='brooksBrownB17Check' value=''>Brooks B17, Brown    +€114.00</label>" +
                            "</div> " +

                            "  <div class='checkbox'> " +
                            " <img src='http://shop.larryvsharry.com/media/catalog/product/cache/1/image/9df78eab33525d08d6e5fb8d27136e95/b/l/black_1_3.png' class='imgbikewizard'> " +

                            "<label><input type='checkbox' id='brooksB17BlackCheck' value=''>Brooks B17, Black    +€114.00</label>" +
                            "</div> " +

                            "  <div class='checkbox'> " +
                            " <img src='http://shop.larryvsharry.com/media/catalog/product/cache/1/image/9df78eab33525d08d6e5fb8d27136e95/s/a/saddle_brown_1.png' class='imgbikewizard'> " +

                            "<label><input type='checkbox' id='brooksB67BrownCheck' value=''>Brooks B67, Brown    +€125.00</label>" +
                            "</div> " +

                            "  <div class='checkbox'> " +
                            " <img src='http://shop.larryvsharry.com/media/catalog/product/cache/1/image/9df78eab33525d08d6e5fb8d27136e95/b/l/black_1_2.png' class='imgbikewizard'> " +
                            "<label><input type='checkbox' id='brooksB67BlackCheck' value=''>Brooks B67, Black    +€125.00</label>" +
                            "</div>" +
                            "</div> " +
                            "</div>";
                        console.log(step);
                        console.log(totalPrice);
                        break;
                    case 5:
                        if (jQuery("#riserCheck").is(':checked')) {
                            handlebarRiser.name = 'Riserbar';
                            handlebarRiser.price = 26;
                            handlebarRiser.image = '';
                            customize.push(handlebarRiser);
                        }
                        if (jQuery("#flatCheck").is(':checked')) {
                            handlebarFlat.name = 'Flatbar';
                            handlebarFlat.price = 26;
                            handlebarFlat.image = '';
                            customize.push(handlebarFlat);
                        }
                        if (jQuery("#cruiserCheck").is(':checked')) {
                            handlebarCruiser.name = 'Cruiserbar';
                            handlebarCruiser.price = 26;
                            handlebarCruiser.image = '';
                            customize.push(handlebarCruiser);
                        }
                        if (jQuery("#shortRadio").is(':checked')) {
                            seatpost.name = 'Short seatpost';
                            seatpost.price = 42;
                            seatpost.image = '';
                            customize.push(seatpost);
                        }
                        if (jQuery("#longRadio").is(':checked')) {
                            seatpost.name = "Long seatpost";
                            seatpost.price = 42;
                            seatpost.image = '';
                            customize.push(seatpost);
                        }
                        if (jQuery("#raceBlackCheck").is(':checked')) {
                            saddleRaceBlack.name = 'Race Black';
                            saddleRaceBlack.price = 54;
                            saddleRaceBlack.image = 'http://shop.larryvsharry.com/media/catalog/product/cache/1/image/9df78eab33525d08d6e5fb8d27136e95/b/l/black_1.png';
                            customize.push(saddleRaceBlack);
                        }
                        if (jQuery("#raceWhiteCheck").is(':checked')) {
                            saddleRaceWhite.name = 'Race White';
                            saddleRaceWhite.price = 54;
                            saddleRaceWhite.image = 'http://shop.larryvsharry.com/media/catalog/product/cache/1/image/9df78eab33525d08d6e5fb8d27136e95/s/a/saddle_white.png';
                            customize.push(saddleRaceWhite);
                        }
                        if (jQuery("#brooksBrownB17Check").is(':checked')) {
                            saddleB17Brown.name = 'Brooks B17, Brown';
                            saddleB17Brown.price = 114;
                            saddleB17Brown.image = 'http://shop.larryvsharry.com/media/catalog/product/cache/1/image/9df78eab33525d08d6e5fb8d27136e95/s/a/saddle_brown.png';
                            customize.push(saddleB17Black);
                        }
                        if (jQuery("#brooksB17BlackCheck").is(':checked')) {
                            saddleB17Black.name = 'Brooks B17, Black';
                            saddleB17Black.price = 114;
                            saddleB17Black.image = 'http://shop.larryvsharry.com/media/catalog/product/cache/1/image/9df78eab33525d08d6e5fb8d27136e95/b/l/black_1_3.png';
                            customize.push(saddleB17Black);
                        }
                        if (jQuery("#brooksB67BrownCheck").is(':checked')) {
                            saddleB67Brown.name = 'Brooks B67, Brown';
                            saddleB67Brown.price = 125;
                            saddleB67Brown.image = 'http://shop.larryvsharry.com/media/catalog/product/cache/1/image/9df78eab33525d08d6e5fb8d27136e95/s/a/saddle_brown_1.png';
                            customize.push(saddleB67Brown);
                        }
                        if (jQuery("#brooksB67BlackCheck").is(':checked')) {
                            saddleB67Black.name = 'Brooks B67, Black';
                            saddleB67Black.price = 125;
                            saddleB67Black.image = 'http://shop.larryvsharry.com/media/catalog/product/cache/1/image/9df78eab33525d08d6e5fb8d27136e95/b/l/black_1_2.png'
                            customize.push(saddleB67Black);
                        }
                        //document.getElementById("bike-wizard-progress-bar").style.width = '50%';
                        updateProgressBar('50%');
                        document.getElementById("bike-wizard-text-field").innerHTML = "<div class='wrapper'>" +
                            "<h1> Step 5 - Accessories</h1>" +
                            " <div class='col-sm-4'>" +
                            "  <div class='checkbox'> " +
                            "<img src='http://shop.larryvsharry.com/media/catalog/product/cache/1/image/9df78eab33525d08d6e5fb8d27136e95/d/o/dogcage_1.png' class='imgbikewizard' >" +
                            "<label><input type='checkbox' id='canopyCheck' value=''>Canopy    +€449.00</label>" +
                            "</div> " +
                            "  <div class='checkbox'> " +
                            "<img src='http://shop.larryvsharry.com/skin/frontend/lvsh/lvsh/images/alubox_1.png' class='imgbikewizard' >" +
                            "<label><input type='checkbox' id='damperCheck' value=''>Damper kit    +€120.00</label>" +
                            "</div> " +
                            "  <div class='checkbox'> " +
                            "<img src='http://shop.larryvsharry.com/skin/frontend/lvsh/lvsh/images/honeycompboard.png' class='imgbikewizard' >" +
                            "<label><input type='checkbox' id='honeyCombCheck' value=''>Honeycomb board    +€188.00</label>" +
                            "</div> " +
                            "  <div class='checkbox'> " +
                            "<img src='http://shop.larryvsharry.com/media/catalog/product/cache/1/image/9df78eab33525d08d6e5fb8d27136e95/7/b/7b31bee8-1a42-45ba-b713-d3bd4086d8d9_lan.png' class='imgbikewizard' >" +
                            "<label><input type='checkbox' id='convoyCheck' value=''>Convoy box    +€833.00</label>" +
                            "</div> " +
                            "  <div class='checkbox'> " +
                            "<img src='http://shop.larryvsharry.com/media/catalog/product/cache/1/image/9df78eab33525d08d6e5fb8d27136e95/a/l/alubox.png' class='imgbikewizard >" +
                            "<label><input type='checkbox' id='aluCheck' value=''>Aluminium box    +€341.00</label>" +
                            "</div> " +
                            "  <div class='checkbox'> " +
                            "<img src='http://shop.larryvsharry.com/media/catalog/product/cache/1/image/9df78eab33525d08d6e5fb8d27136e95/p/l/plastbox.png' class='imgbikewizard' >" +
                            "<label><input type='checkbox' id='plasticCheck' value=''>Plastic box    +€43.00</label>" +
                            "</div> " +
                            "</div>" +

                            " <div class='col-sm-4'>" +
                            "<h3> BBX </h3>" +

                            "<img src='http://shop.larryvsharry.com/skin/frontend/lvsh/lvsh/images/sidepanel_kit.png' class='imgbikewizard' >" +
                            "  <div class='radio'> " +
                            "<img src='http://shop.larryvsharry.com/media/catalog/product/cache/1/image/9df78eab33525d08d6e5fb8d27136e95/b/b/bbx-sidepanel-kit-indigo.png' class='imgbikewizard' >" +
                            "<label><input type='radio' id='blueBBXRadio' value='optradio'>Blue    +€354.00" +
                            "</label>" +
                            "</div> " +

                            "  <div class='radio'> " +
                            "<img src='http://shop.larryvsharry.com/media/catalog/product/cache/1/image/9df78eab33525d08d6e5fb8d27136e95/b/b/bbx-sidepanel-kit-race.png' class='imgbikewizard' >" +

                            "<label><input type='radio' id='greenBBXRadio' value='optradio'>Green     +€354.00</label>" +
                            "</div> " +
                            "  <div class='radio'> " +
                            "<img src='http://shop.larryvsharry.com/media/catalog/product/cache/1/image/9df78eab33525d08d6e5fb8d27136e95/b/b/bbx-sidepanel-kit-submarine_1.png' class='imgbikewizard' >" +

                            "<label><input type='radio' id='yellowBBXRadio' value='optradio'>Yellow    +€354.00</label>" +
                            "</div> " +
                            "</div>" +

                            " <div class='col-sm-4'>" +
                            "<h3> Billboard </h3>" +
                            "<img src='http://shop.larryvsharry.com/skin/frontend/lvsh/lvsh/images/billboard.png' class='imgbikewizard' >" +

                            "  <div class='radio'> " +
                            "<img src='http://shop.larryvsharry.com/media/catalog/product/cache/1/thumbnail/9df78eab33525d08d6e5fb8d27136e95/3/2/32_1_1.png' class='imgcolourbikewizard' >" +
                            "<label><input type='radio' id='whiteBillRadio' value='optradio'>1    +€69.00</label>" +
                            "</div> " +

                            "  <div class='radio'> " +
                            "<img src='http://shop.larryvsharry.com/media/catalog/product/cache/1/thumbnail/9df78eab33525d08d6e5fb8d27136e95/3/2/323_2.png' class='imgcolourbikewizard' >" +
                            "<label><input type='radio' id='blackBillRadio' value='optradio'>2    +€69.00</label>" +
                            "</div> " +

                            "  <div class='radio'> " +
                            "<img src='http://shop.larryvsharry.com/media/catalog/product/cache/1/thumbnail/9df78eab33525d08d6e5fb8d27136e95/5/0/502_4.png' class='imgcolourbikewizard' >" +
                            "<label><input type='radio' id='redBillRadio' value='optradio'>3    +€69.00</label>" +
                            "</div> " +

                            "  <div class='radio'> " +
                            "<img src='http://shop.larryvsharry.com/media/catalog/product/cache/1/thumbnail/9df78eab33525d08d6e5fb8d27136e95/5/0/503_3.png' class='imgcolourbikewizard' >" +

                            "<label><input type='radio' id='orangeBillRadio' value='optradio'>4    +€69.00</label>" +
                            "</div> " +
                            "  <div class='radio'> " +
                            "<img src='http://shop.larryvsharry.com/media/catalog/product/cache/1/thumbnail/9df78eab33525d08d6e5fb8d27136e95/5/0/504_1_1.png' class='imgcolourbikewizard' >" +

                            "<label><input type='radio' id='blueBillRadio' value='optradio'>5    +€69.00</label>" +
                            "</div> " +
                            "  <div class='radio'> " +
                            "<img src='http://shop.larryvsharry.com/media/catalog/product/cache/1/thumbnail/9df78eab33525d08d6e5fb8d27136e95/5/0/506_3.png' class='imgcolourbikewizard' >" +

                            "<label><input type='radio' id='greenBillRadio' value='optradio'>6    +€69.00</label>" +
                            "</div> " +
                            "  <div class='radio'> " +
                            "<img src='http://shop.larryvsharry.com/media/catalog/product/cache/1/thumbnail/9df78eab33525d08d6e5fb8d27136e95/5/0/508_3.png' class='imgcolourbikewizard' >" +

                            "<label><input type='radio' id='yellowBillRadio' value='optradio'>7    +€69.00</label>" +
                            "</div> " +

                            "</div>" +
                               " <br> <br>" +
                            " <div class='bikenote' >  <p >The BBX side + cover, Foldable seat and Canopy all need the HCB.<p> </div> " +
                            "</div>";
                        console.log(step);
                        console.log(totalPrice);
                        break;
                    case 6:
                        //document.getElementById("bike-wizard-progress-bar").style.width = '60%';
                        if (jQuery("#canopyCheck").is(':checked')) {
                            accessories.push(canopy);
                        }
                        if (jQuery("#damperCheck").is(':checked')) {
                            accessories.push(damperKit);
                        }
                        if (jQuery("#honeyCombCheck").is(':checked')) {
                            accessories.push(honeycombBoard);
                        }
                        if (jQuery("#convoyCheck").is(':checked')) {
                            accessories.push(convoyBox);
                        }
                        if (jQuery("#aluCheck").is(':checked')) {
                            accessories.push(aluminumBox);
                        }
                        if (jQuery("#plasticCheck").is(':checked')) {
                            accessories.push(plasticBox);
                        }
                        if (jQuery("#blueBBXRadio").is(':checked')) {
                            bbx.colour = 'Blue';
                            accessories.push(bbx);
                        } else if (jQuery("#greenBBXRadio").is(':checked')) {
                            bbx.colour = 'Green';
                            accessories.push(bbx);
                        } else if (jQuery("#yellowBBXRadio").is(':checked')) {
                            bbx.colour = 'Yellow';
                            accessories.push(bbx);
                        }

                        if (jQuery("#whiteBillRadio").is(':checked')) {
                            billBoard.colour = 'White';
                            accessories.push(billBoard);
                        } else if (jQuery("#blackBillRadio").is(':checked')) {
                            billBoard.colour = 'Black';
                            accessories.push(billBoard);
                        } else if (jQuery("#redBillRadio").is(':checked')) {
                            billBoard.colour = 'Red';
                            accessories.push(billBoard);
                        } else if (jQuery("#orangeBillRadio").is(':checked')) {
                            billBoard.colour = 'Orange';
                            accessories.push(billBoard);
                        } else if (jQuery("#blueBillRadio").is(':checked')) {
                            billBoard.colour = 'Blue';
                            accessories.push(billBoard);
                        } else if (jQuery("#greenBillRadio").is(':checked')) {
                            billBoard.colour = 'Green';
                            accessories.push(billBoard);
                        } else if (jQuery("#yellowBillRadio").is(':checked')) {
                            billBoard.colour = 'Yellow';
                            accessories.push(billBoard);
                        }

                        updateProgressBar('60%');
                        document.getElementById("bike-wizard-text-field").innerHTML = "<div class='wrapper'>" +
                            "<h1> Step 6 - Extras</h1>" +
                            "<div class='col-sm-6'>" +
                            "  <div class='checkbox'> " +
                            "<label><input type='checkbox' id='dynamoCheck' value=''>DYNAMO 20\" FRONT WHEEL (ALFINE/ALEX DM24)    +€166.00</label>" +
                            "</div> " +
                            "  <div class='checkbox'> " +
                            "<label><input type='checkbox' id='reeLightsCheck' value=''>REELIGHTS    +€76.00</label>" +
                            "</div> " +
                            "  <div class='checkbox'> " +
                            "<label><input type='checkbox' id='chromoCheck' value=''>CROMO KICKSTAND    +€102.00</label>" +
                            "</div>" +
                            "</div> " +
                            "<div class='col-sm-6'>" +
                            "  <div class='checkbox'> " +
                            "<label><input type='checkbox' id='abus5400Check' value=''>ABUS 5400 GRANITE U-LOCK    +€145.00</label>" +
                            "</div> " +
                            "  <div class='checkbox'> " +
                            "<label><input type='checkbox' id='abusBordoCheck' value=''>ABUS BORDO 6500 GRANIT X PLUS    +€131.00</label>" +
                            "</div> " +
                            "  <div class='checkbox'> " +
                            "<label><input type='checkbox' id='abus9100Check' value=''>ABUS 9100 IVY CHAIN LOCK    +€131.00</label>" +
                            "</div> " +
                            "  <div class='checkbox'> " +
                            "<label><input type='checkbox' id='abusBordoPlusCheck' value=''>ABUS BORDO + DETECTO 8077 ALARM    +€319.00</label>" +
                            "</div>" +
                            "</div> " +
                            "</div>";
                        console.log(step);
                        console.log(totalPrice);
                        break;
                    case 7:
                        if (jQuery("#dynamoCheck").is(':checked')) {
                            extras.push(dynamo);
                        }
                        if (jQuery("#reeLightsCheck").is(':checked')) {
                            extras.push(reeLights);
                        }
                        if (jQuery("#chromoCheck").is(':checked')) {
                            extras.push(chromoKickstand);
                        }
                        if (jQuery("#abus5400Check").is(':checked')) {
                            extras.push(abus5400);
                        }
                        if (jQuery("#abusBordoCheck").is(':checked')) {
                            extras.push(abusBordo);
                        }
                        if (jQuery("#abus9100Check").is(':checked')) {
                            extras.push(abus9100);
                        }
                        if (jQuery("#abusBordoPlusCheck").is(':checked')) {
                            extras.push(abusBordoPlus);
                        }
                        calculateTotalPrice();
                        //document.getElementById("bike-wizard-progress-bar").style.width = '70%';
                        updateProgressBar('70%');
                        document.getElementById("bike-wizard-text-field").innerHTML = "<div class='wrapper'>" +
                            "<h1>Step 7 - What you are buying</h1>" +
                            "<p> Here you will find a list of what items you have checked off, and recommendations on what you are missing. <br>" +
                            "Here you can check off things if you have regret or do not want to buy them. <br> " +
                            "If everything seems like it is in order, then just click next and go to the payment site. </p>" +
                            "</div>" +
                            "<div> " + showSelectedFrame() + "</div>" +
                            "<div> " + showSelectedCustomizeOptions() + "</div>" +
                            "<div> " + showSelectedAccessories() + "</div>" +
                            "<div> " + showSelectedExtras() + "</div>" +
                            "<div>Subtotal: €" + totalPrice + "</div>";
                        console.log(step);
                        console.log('€' + totalPrice );
                        break;
                    case 8:
                        //document.getElementById("bike-wizard-progress-bar").style.width = '80%';
                        updateProgressBar('80%');
                        document.getElementById("bike-wizard-text-field").innerHTML = "<div class='wrapper'>" +
                            "<h1>Step 8 - Payment</h1>" +
                            "<p> This is the payment area. Where there will be a form where you can pay. " +
                            " <form class='form-horizontal'>" +
                            "    <div class='form-group'>" +
                            "      <label class='col-sm-2 control-label'>Email</label>" +
                            "      <div class='col-sm-10'>" +
                            "        <input class='form-control' id='focusedInput' type='text' value='Enter email...'>" +
                            "      </div>" +
                            "    </div>" +

                            "    <div class='form-group'>" +
                            "      <label class='col-sm-2 control-label'>Name</label>" +
                            "      <div class='col-sm-10'>" +
                            "        <input class='form-control' id='focusedInput' type='text' value='Enter Name...'>" +
                            "      </div>" +
                            "    </div>" +

                            "    <div class='form-group'>" +
                            "      <label class='col-sm-2 control-label'>Adress</label>" +
                            "      <div class='col-sm-10'>" +
                            "        <input class='form-control' id='focusedInput' type='text' value='Enter Adress...'>" +
                            "      </div>" +
                            "    </div>" +
                            "    <div class='form-group'>" +
                            "      <label class='col-sm-2 control-label'>Cardnumber</label>" +
                            "      <div class='col-sm-10'>" +
                            "        <input class='form-control' id='focusedInput' type='text' value='Enter Cardnumber...'>" +
                            "      </div>" +
                            "    </div>" +
                            "<div class='form-group'> " +
                            "      <div class='col-sm-offset-2 col-sm-10'>" +
                            "        <button type='submit' class='btn btn-default'>Submit</button>" +
                            "      </div>" +
                            "    </div>" +
                            "  </form>" +
                            "</p>" +
                            "</div>";
                        console.log(step);
                        break;
                    case 9:
                        //document.getElementById("bike-wizard-progress-bar").style.width = '90%';
                        updateProgressBar('90%');
                        document.getElementById("bike-wizard-text-field").innerHTML = "<div class='wrapper'>" +
                            "<h1>Step 9 - Order confirmation</h1>" +
                            "<p> Here you can see you order, that are payed and waiting to be packed and shipped </p>" +
                            "</div>";
                        console.log(step);
                        console.log(totalPrice);
                        break;
                    case 10:
                        //document.getElementById("bike-wizard-progress-bar").style.width = '100%';
                        updateProgressBar('100%');
                        document.getElementById("bike-wizard-text-field").innerHTML = "<div class='wrapper'>" +
                            "<h1>Step 10 - Thank you for your purchase </h1>" +
                            "<p>Here is some other things you might find interesting </p>" +
                            "</div>";
                        console.log(step);
                        break;
                    case 11:
                        if (this.step > 10) {this.step = 10;}
                        //document.getElementById("bike-wizard-progress-bar").style.width = '100%';
                        updateProgressBar('100%');
                        document.getElementById("bike-wizard-text-field").innerHTML ="<div class='wrapper'>" +
                            "<h1>Step 10 - Thank you for your purchase </h1>" +
                            "<p>Here is some other things you might find interesting </p>" +
                            "</div>";
                        console.log(step);
                        console.log(totalPrice);
                        break;
                    default:
                       // document.getElementById("bike-wizard-progress-bar").style.width = '100%';
                      //  document.getElementById("bike-wizard-text-field").innerHTML = "Step 10...";
                        console.log(step);
                        break;

                }
            }

            function showSelectedFrame() {
                return 'You have selected a ' + colour.name  + ' ' + frame.name + ' , with an ' + driveTrain.name + ' drivetrain.';
            }
            function showSelectedCustomizeOptions() {
                var returnString = '<br>You have customized your Bullitt with: <br>'
                for (i = 0; i < customize.length; i++) {
                    returnString+= customize[i].name + "<br>";
                }
                return returnString;
            }
            function showSelectedAccessories() {
                var returnString = '<br>You have chosen the following accessories: <br>';
                for (i = 0; i < accessories.length; i++) {
                    returnString += 'a/an ' + accessories[i].colour + ' ' + accessories[i].name + '<br>';
                }
                return returnString;
            }


            function showSelectedExtras() {
                var returnString = '<br>And you\'ve chosen the following extras:<br>';
                for (i = 0; i < extras.length; i++) {
                    returnString += extras[i].name + '<br>';
                }
                return returnString;
            }

            function calculateTotalPrice() {
                totalPrice += frame.price;
                totalPrice += driveTrain.price;
                for (i = 0; i < customize.length; i++) {
                    totalPrice += customize[i].price;
                }
                for (j = 0; j < accessories.length; j++) {
                    totalPrice += accessories[j].price;
                }
                for (k = 0; k < extras.length; k++) {
                    totalPrice += extras[k].price;
                }
            }

            function wizardButtonClickedback() {
                step--;

                switch(step) {
                    case -1:
                        if (this.step < 0) {
                            this.step = 0;
                        }
                        document.getElementById("bike-wizard-progress-bar").style.width = '0%';
                        document.getElementById("bike-wizard-text-field").innerHTML = "Welcome to the bike wizard. Here you can custom build your own Bullit.";
                        console.log(step);
                        break;
                    case 0:

                        document.getElementById("bike-wizard-progress-bar").style.width = '0%';
                        document.getElementById("bike-wizard-text-field").innerHTML = "Introduction\n" +
                            "\n" +
                            "Bullitt’s are as different as the people who ride them and with years of experience, we have developed what we believe to be the ultimate, do-it-all cargo bike.\n" +
                            "\n" +
                            "Designed, built and ridden daily in Copenhagen and across the globe.\n" +
                            "9 colour options and a diverse component and accessory line.\n" +
                            "\n" +
                            "With quick delivery and availability, competitive pricing and a highly developed system of components and accessories, the Bullitt is the quickest, most flexible and durable solution currently on the market.\n" +
                            "\n" +
                            "This buyer’s guide is designed to help you choose the correct Bullitt model and pair you with the most appropriate accessories for your needs.";
                        console.log(step);
                        break;
                    case 1:
                        document.getElementById("bike-wizard-progress-bar").style.width = '10%';
                        document.getElementById("bike-wizard-text-field").innerHTML =  "<div class='wrapper'>" +
                            " <h1> Step 1 - Choose Your Bike</h1> " +
                            "<div class='col-sm-4 ' >" +
                            "<img src='http://shop.larryvsharry.com/skin/frontend/lvsh/lvsh/images/homepage-full-bike-icon.png' class='imgbikewizard' >" +
                            "       <div class='radio'>" +
                            "           <label><input type='radio' name='optradio'>Fullbike</label> " +
                            "       </div> " +
                            "Full Bike\n" +
                            "If you are buying a Full bike, everything to ride safely and securely is included; reflectors complying with EU regulations, front and rear mudguards to keep that gritty spray away and an Abus, insurance approved ring lock." +
                            "</div>" +

                            "   <div class='col-sm-4'>" +
                            "<img src='http://shop.larryvsharry.com/skin/frontend/lvsh/lvsh/images/homepage-frame-kit-icon.png' class='imgbikewizard'>" +

                            "        <div class='radio'>" +
                            "           <label><input type='radio' name='optradio'>Framekit</label> " +
                            "          </div> " +
                            "Framekit\n" +
                            "If you have bought a Bullitt frame, here's what to expect; An aluminium frame, chromoly steel fork, steering rod and fittings, FSA 1 1/8 headsets, tapered headset and spacers and a sturdy kickstand. We also include our newly developed, interchangeable dropouts. Please specify whether you require dropouts for internal or external gears, or horizontal singlespeed dropouts with your order." +
                            "   </div>" +

                            "   <div class='col-sm-4'>" +
                            "<img src='http://shop.larryvsharry.com/media/catalog/product/cache/1/image/9df78eab33525d08d6e5fb8d27136e95/e/b/ebullit_drivetrain2_test_3.png' class='imgbikewizard'>" +
                            "       <div class='radio'>" +
                            "           <label><input type='radio' name='optradio'>Steps EBullit Full Bike</label> " +
                            "       </div>" +
                            "The STePS eBullitt system includes a 250W, 36-volt electric drive unit, or motor, that will help get you up to speed, but cuts out at 15.5mph (25km/h). You can go faster than that if you want but any speeds over 15.5mph have to be generated by either pedalling or gravity alone. The drive unit produces a maximum torque of 50nm and weighs 3.2kg, making it one of the lightest on the market." +
                            "   </div> " +
                            "</div> ";
                        console.log(step);
                        break;
                    case 2:
                        document.getElementById("bike-wizard-progress-bar").style.width = '20%';
                        document.getElementById("bike-wizard-text-field").innerHTML =  "<div class='wrapper'>" +
                            "   <h1> Step 2 - Choose Your colour</h1>" +
                            " <div class='col-sm-4'>" +
                            "    <div class='radio'>" +
                            " <img src='http://shop.larryvsharry.com/media/catalog/product/cache/1/thumbnail/9df78eab33525d08d6e5fb8d27136e95/c/i/circle-classic_1.png' class='imgcolourbikewizard'> " +
                            "       <label><input type='radio' name='optradio'>Classic</label> " +
                            "   </div> "+
                            "   <div class='radio'>" +
                            " <img src='http://shop.larryvsharry.com/media/catalog/product/cache/1/thumbnail/9df78eab33525d08d6e5fb8d27136e95/c/i/circle-race_1_1.png' class='imgcolourbikewizard'> " +
                            "       <label><input type='radio' name='optradio'>Race</label> " +
                            "   </div> " +
                            "   <div class='radio'>" +
                            " <img src='http://shop.larryvsharry.com/media/catalog/product/cache/1/thumbnail/9df78eab33525d08d6e5fb8d27136e95/p/e/pepper_colour.png' class='imgcolourbikewizard'> " +
                            "       <label><input type='radio' name='optradio'>Pepper</label>" +
                            "   </div> " +
                            " </div>" +

                            " <div class='col-sm-4'>" +
                            "   <div class='radio'>" +
                            " <img src='http://shop.larryvsharry.com/media/catalog/product/cache/1/thumbnail/9df78eab33525d08d6e5fb8d27136e95/s/u/submarine_colour.png' class='imgcolourbikewizard'> " +
                            "       <label><input type='radio' name='optradio'>Submarine</label>" +
                            "   </div> " +
                            "   <div class='radio'>" +
                            " <img src='http://shop.larryvsharry.com/media/catalog/product/cache/1/thumbnail/9df78eab33525d08d6e5fb8d27136e95/c/i/circle-bluebird_1.png' class='imgcolourbikewizard'> " +
                            "       <label><input type='radio' name='optradio'>Bluebird</label>" +
                            "   </div> " +
                            "   <div class='radio'>" +
                            " <img src='http://shop.larryvsharry.com/media/catalog/product/cache/1/thumbnail/9df78eab33525d08d6e5fb8d27136e95/c/i/circle-generic_2.png' class='imgcolourbikewizard'> " +
                            "       <label><input type='radio' name='optradio'>Milk Plus</label>" +
                            "   </div> " +
                            " </div>" +

                            " <div class='col-sm-4'>" +
                            "   <div class='radio'>" +
                            " <img src='http://shop.larryvsharry.com/media/catalog/product/cache/1/thumbnail/9df78eab33525d08d6e5fb8d27136e95/c/i/circle-clockwork_1.png' class='imgcolourbikewizard'> " +

                            "       <label><input type='radio' name='optradio'>Clockwork</label>" +
                            "   </div> " +
                            "   <div class='radio'>" +
                            " <img src='http://shop.larryvsharry.com/media/catalog/product/cache/1/thumbnail/9df78eab33525d08d6e5fb8d27136e95/c/i/circle-lizzard-king_1.png' class='imgcolourbikewizard'> " +

                            "       <label><input type='radio' name='optradio'>Lizardking</label>" +
                            "   </div> " +
                            "   <div class='radio'>" +
                            " <img src='http://shop.larryvsharry.com/media/catalog/product/cache/1/thumbnail/9df78eab33525d08d6e5fb8d27136e95/c/i/circle-raw_1.png' class='imgcolourbikewizard'> " +

                            "       <label><input type='radio' name='optradio'>Rå</label>" +
                            "   </div> " +
                            " </div>" +
                            "</div>";
                        console.log(step);
                        break;
                    case 3:
                        document.getElementById("bike-wizard-progress-bar").style.width = '30%';
                        document.getElementById("bike-wizard-text-field").innerHTML = "<div class='wrapper'>" +
                            "   <h1> Step 3 - Model</h1>" +

                            "<div class='col-sm-6'>" +

                            "       <div class='radio'>" +
                            "           <label><input type='radio' name='optradio'>SINGLESPEED COMPONENT GROUP  </label> " +
                            "       </div> "+
                            "       <div class='radio'>" +
                            "           <label><input type='radio' name='optradio'>NEXUS 7 COMPONENT GROUP  </label> " +
                            "       </div> " +
                            "       <div class='radio'>" +
                            "           <label><input type='radio' name='optradio'>ALFINE 8 COMPONENT GROUP</label>" +
                            "       </div> " +
                            "       <div class='radio'>" +
                            "        <label><input type='radio' name='optradio'>ALFINE 8 GATES COMPONENT GROUP  </label>" +
                            "       </div> " +
                            "</div>" +

                            "<div class='col-sm-6'>" +
                            "   <div class='radio'>" +
                            "       <label><input type='radio' name='optradio'>ALFINE DI2 11/GATES COMPONENT GROUP </label>" +
                            "   </div> " +
                            "   <div class='radio'>" +
                            "       <label><input type='radio' name='optradio'>DEORE 20 COMPONENT GROUP  </label>" +
                            "   </div> " +
                            "   <div class='radio'>" +
                            "       <label><input type='radio' name='optradio'>XT 22 COMPONENT GROUP  </label>" +
                            "   </div> " +
                            "</div>" +
                            "<br>" +
                            "<br>" +
                            "<div class='small-12 columns tablecontent'><h2>Model comparison chart</h2>\n" +
                            "<button type='button' class='btn btn-info' data-toggle='collapse' data-target='#demo'>Click here to show comparison chart</button>" +
                            "<div id='demo' class='collapse'>" +
                            "<table  class='table table-striped'>\n" +
                            "<tbody>\n" +
                            "<tr>\n" +
                            "<td></td>\n" +
                            "<td style=\"width: 15px;\"></td>\n" +
                            "<td>\n" +
                            "<h4>Nexus 7</h4>\n" +
                            "</td>\n" +
                            "<td>\n" +
                            "<h4>Alfine 8</h4>\n" +
                            "</td>\n" +
                            "<td>\n" +
                            "<h4>Alfine 11 Di2/Gates Drive</h4>\n" +
                            "</td>\n" +
                            "</tr>\n" +
                            "<tr>\n" +
                            "<td><strong>Drivetrain</strong></td>\n" +
                            "<td></td>\n" +
                            "<td>7 speed internal Nexus hub</td>\n" +
                            "<td>8 speed internal Alfine hub</td>\n" +
                            "<td>11 speed Di2 Alfine/Gates CDX</td>\n" +
                            "</tr>\n" +
                            "<tr>\n" +
                            "<td><strong>Wheels</strong></td>\n" +
                            "<td></td>\n" +
                            "<td>Alex Rims dm24/Novatec hubs</td>\n" +
                            "<td>Alex Rims dm24 /Alfine 8 hub</td>\n" +
                            "<td>Alex Rims Supra/Alfine 11 hub</td>\n" +
                            "</tr>\n" +
                            "<tr>\n" +
                            "<td><strong>Tyres</strong></td>\n" +
                            "<td></td>\n" +
                            "<td>Schwalbe Marathon 1.75″</td>\n" +
                            "<td>Schwalbe Marathon 1.75″</td>\n" +
                            "<td>Schwalbe Marathon Supreme 1.60″</td>\n" +
                            "</tr>\n" +
                            "<tr>\n" +
                            "<td><strong>Finishing Kit</strong></td>\n" +
                            "<td></td>\n" +
                            "<td>Alu seatpost, stem and riserbars</td>\n" +
                            "<td>Alu seatpost, stem and riserbars</td>\n" +
                            "<td>Alu seatpost, stem and riserbars</td>\n" +
                            "</tr>\n" +
                            "<tr>\n" +
                            "<td><strong>Pedals</strong></td>\n" +
                            "<td></td>\n" +
                            "<td>Wellgo flat pedals</td>\n" +
                            "<td>Wellgo flat pedals</td>\n" +
                            "<td>Wellgo flat pedals</td>\n" +
                            "</tr>\n" +
                            "<tr>\n" +
                            "<td><strong>Crankset/BB</strong></td>\n" +
                            "<td></td>\n" +
                            "<td>Truvativ/42T chainring<br>\n" +
                            "Truvativ powerspline bb</td>\n" +
                            "<td>Alfine crank/42T chainring<br>\n" +
                            "Hollowtech 2 bb</td>\n" +
                            "<td>Alfine crank/Gates chainring 46T<br>\n" +
                            "Hollowtech 2 bb</td>\n" +
                            "</tr>\n" +
                            "<tr>\n" +
                            "<td><strong>Saddle</strong></td>\n" +
                            "<td></td>\n" +
                            "<td>Velo Racing</td>\n" +
                            "<td>Velo Racing</td>\n" +
                            "<td>Velo Racing</td>\n" +
                            "</tr>\n" +
                            "<tr>\n" +
                            "<td><strong>Brakes</strong></td>\n" +
                            "<td></td>\n" +
                            "<td>Tektro hydraulic disc front/<br>\n" +
                            "back pedal rear brake</td>\n" +
                            "<td>Magura MT5 hydraulic disc<br>\n" +
                            "brakes w 180mm discs</td>\n" +
                            "<td>Magura MT5 hydraulic disc<br>\n" +
                            "brakes w 180mm discs</td>\n" +
                            "</tr>\n" +
                            "</tbody>\n" +
                            "</table>\n" +
                            "<table  class='table table-striped'>\n" +
                            "<tbody>\n" +
                            "<tr>\n" +
                            "<td></td>\n" +
                            "<td style=\"width: 15px;\"></td>\n" +
                            "<td>\n" +
                            "<h4>Deore 20</h4>\n" +
                            "</td>\n" +
                            "<td>\n" +
                            "<h4>XT 22</h4>\n" +
                            "</td>\n" +
                            "<td>\n" +
                            "<h4>Singlespeed</h4>\n" +
                            "</td>\n" +
                            "</tr>\n" +
                            "<tr>\n" +
                            "<td><strong>Drivetrain</strong></td>\n" +
                            "<td></td>\n" +
                            "<td>20 speed/Deore derailleurs/11-32 cassette</td>\n" +
                            "<td>22 speed/XT derailleurs/<br>\n" +
                            "11-42 cassette</td>\n" +
                            "<td>–</td>\n" +
                            "</tr>\n" +
                            "<tr>\n" +
                            "<td><strong>Wheels</strong></td>\n" +
                            "<td></td>\n" +
                            "<td>Alex Rims dm24/Novatec hubs</td>\n" +
                            "<td>Alex Rims Supra/Novatec hubs</td>\n" +
                            "<td>Alex Rims dm24/ Novatec hubs</td>\n" +
                            "</tr>\n" +
                            "<tr>\n" +
                            "<td><strong>Tyres</strong></td>\n" +
                            "<td></td>\n" +
                            "<td>Schwalbe Marathon 1.75″</td>\n" +
                            "<td>Schwalbe Kojak 1.35″</td>\n" +
                            "<td>Schwalbe Marathon 1.75″</td>\n" +
                            "</tr>\n" +
                            "<tr>\n" +
                            "<td><strong>Finishing Kit</strong></td>\n" +
                            "<td></td>\n" +
                            "<td>Alu seatpost, stem and riserbars</td>\n" +
                            "<td>Thomson Trail bar, Elite seatpost, X4 stem and saddleclamp.</td>\n" +
                            "<td>Alu seatpost, stem and riserbar</td>\n" +
                            "</tr>\n" +
                            "<tr>\n" +
                            "<td><strong>Pedals</strong></td>\n" +
                            "<td></td>\n" +
                            "<td>Wellgo flat pedals</td>\n" +
                            "<td>Wellgo flat pedals</td>\n" +
                            "<td>Wellgo flat pedals</td>\n" +
                            "</tr>\n" +
                            "<tr>\n" +
                            "<td><strong>Crankset/BB</strong></td>\n" +
                            "<td></td>\n" +
                            "<td>Deore crank/40,24T chainrings<br>\n" +
                            "Hollowtech II bottom bracket</td>\n" +
                            "<td>XT crank/38,28T chainrings<br>\n" +
                            "Hollowtech II bottom bracket</td>\n" +
                            "<td>Truvativ (42t chainring)</td>\n" +
                            "</tr>\n" +
                            "<tr>\n" +
                            "<td><strong>Saddle</strong></td>\n" +
                            "<td></td>\n" +
                            "<td>Velo Racing</td>\n" +
                            "<td>Velo Racing</td>\n" +
                            "<td>Velo Racing</td>\n" +
                            "</tr>\n" +
                            "<tr>\n" +
                            "<td><strong>Brakes</strong></td>\n" +
                            "<td></td>\n" +
                            "<td>Tektro hydraulic disc<br>\n" +
                            "brakes w 180mm discs</td>\n" +
                            "<td>Shimano Zee hydraulic disc<br>\n" +
                            "brakes w 180mm discs</td>\n" +
                            "<td>Tektro hydraulic disc brakes<br>\n" +
                            "w 180mm discs</td>\n" +
                            "</tr>\n" +
                            "</tbody>\n" +
                            "</table>\n" +
                            "<table  class='table table-striped'>\n" +
                            "<tbody>\n" +
                            "<tr>\n" +
                            "<td></td>\n" +
                            "<td style=\"width: 15px;\"></td>\n" +
                            "<td>\n" +
                            "<h4>Zee 10</h4>\n" +
                            "</td>\n" +
                            "<td>\n" +
                            "<h4>Saint 10</h4>\n" +
                            "</td>\n" +
                            "<td></td>\n" +
                            "</tr>\n" +
                            "<tr>\n" +
                            "<td><strong>Drivetrain</strong></td>\n" +
                            "<td></td>\n" +
                            "<td>10 speed/Zee derailleur/<br>\n" +
                            "11-36t cassette</td>\n" +
                            "<td>10 speed/Saint derailleur/<br>\n" +
                            "11-36t cassette</td>\n" +
                            "<td></td>\n" +
                            "</tr>\n" +
                            "<tr>\n" +
                            "<td><strong>Wheels</strong></td>\n" +
                            "<td></td>\n" +
                            "<td>Alex Rims DM24/ Zee hubs<br>\n" +
                            "(20mm thru axle front)</td>\n" +
                            "<td>Alex Rims Supra/ Saint hubs<br>\n" +
                            "(20mm thru axle)</td>\n" +
                            "<td></td>\n" +
                            "</tr>\n" +
                            "<tr>\n" +
                            "<td><strong>Tyres</strong></td>\n" +
                            "<td></td>\n" +
                            "<td>Schwalbe Marathon 1.75″</td>\n" +
                            "<td>Schwalbe Marathon Supreme 1.60″</td>\n" +
                            "<td></td>\n" +
                            "</tr>\n" +
                            "<tr>\n" +
                            "<td><strong>Finishing Kit</strong></td>\n" +
                            "<td></td>\n" +
                            "<td>Alu seatpost, stem and riserbars</td>\n" +
                            "<td>FSA Carbon bar and seatpost, FSA stem</td>\n" +
                            "<td></td>\n" +
                            "</tr>\n" +
                            "<tr>\n" +
                            "<td><strong>Pedals</strong></td>\n" +
                            "<td></td>\n" +
                            "<td>Wellgo flat pedals</td>\n" +
                            "<td>Wellgo flat pedals</td>\n" +
                            "<td></td>\n" +
                            "</tr>\n" +
                            "<tr>\n" +
                            "<td><strong>Crankset/BB</strong></td>\n" +
                            "<td></td>\n" +
                            "<td>Zee crank/36T chainring<br>\n" +
                            "Hollowtech 2 bb</td>\n" +
                            "<td>Saint crank/36T chainring</td>\n" +
                            "<td></td>\n" +
                            "</tr>\n" +
                            "<tr>\n" +
                            "<td><strong>Saddle</strong></td>\n" +
                            "<td></td>\n" +
                            "<td>Velo Racing</td>\n" +
                            "<td>Velo Racing</td>\n" +
                            "<td></td>\n" +
                            "</tr>\n" +
                            "<tr>\n" +
                            "<td><strong>Brakes</strong></td>\n" +
                            "<td></td>\n" +
                            "<td>Shimano Zee hydraulic disc<br>\n" +
                            "brakes w 203mm discs</td>\n" +
                            "<td>Shimano Saint hydraulic disc<br>\n" +
                            "brakes w 203mm discs</td>\n" +
                            "<td></td>\n" +
                            "</tr>\n" +
                            "</tbody>\n" +
                            "</table>\n" +
                            "</div>" +
                            "</div>" +
                            "" +
                            "</div>";
                        console.log(step);
                        break;
                    case 4:
                        document.getElementById("bike-wizard-progress-bar").style.width = '40%';
                        document.getElementById("bike-wizard-text-field").innerHTML =   "<div class='wrapper'>" +
                            "<h1> Step 4 - Customise</h1>" +
                            "All our models feature powerful, hydraulic disc brake systems for smoother, more controlled stopping. We have purposefully chosen brakes from leading manufacturers Shimano, Magura and Tektro and matched them to the most relevant component groups. For simple aftermarket servicing, we have also ensured our brakes have great brake pad durability and easy aftermarket servicing." +
                            "<br><br>" +
                            " <div class='col-sm-4'>" +
                            "<h3> Handlebars </h3>" +
                            "  <div class='checkbox'> " +
                            "<label><input type='checkbox' value=''>Riserbar</label>" +
                            "</div> " +
                            "  <div class='checkbox'> " +
                            "<label><input type='checkbox' value=''>Flatbar</label>" +
                            "</div> " +
                            "  <div class='checkbox'> " +
                            "<label><input type='checkbox' value=''>Cruiser</label>" +
                            "</div>" +
                            "</div> " +
                            " <div class='col-sm-4'>" +
                            "<h3> Seatposts </h3>" +
                            "  <div class='checkbox'> " +
                            "<label><input type='checkbox' value=''>Short</label>" +
                            "</div> " +
                            "  <div class='checkbox'> " +
                            "<label><input type='checkbox' value=''>Long</label>" +
                            "</div>" +
                            "<p>The Bullitt is a one frame solution, designed to fit the greatest number of people and we have spent years tweaking geometry. A sloping top tube, short back-end and low bottom bracket means great manueveurability. We offer two different seatpost lengths and two different stem lengths to cater for different users and our Easyup Stemlifter means the cockpit can quickly and easily be raised to enable more space in the cargo area.</p>" +
                            "</div> " +
                            " <div class='col-sm-4'>" +
                            "<h3> Saddles </h3>" +
                            "  <div class='checkbox'>" +
                            " <img src='http://shop.larryvsharry.com/media/catalog/product/cache/1/image/9df78eab33525d08d6e5fb8d27136e95/b/l/black_1.png' class='imgbikewizard'> " +

                            "<label><input type='checkbox' value=''>Race Black</label>" +
                            "</div> " +
                            "  <div class='checkbox'> " +
                            " <img src='http://shop.larryvsharry.com/media/catalog/product/cache/1/image/9df78eab33525d08d6e5fb8d27136e95/s/a/saddle_white.png' class='imgbikewizard'> " +
                            "<label><input type='checkbox' value=''>Race White</label>" +
                            "</div> " +

                            "  <div class='checkbox'> " +
                            " <img src='http://shop.larryvsharry.com/media/catalog/product/cache/1/image/9df78eab33525d08d6e5fb8d27136e95/s/a/saddle_brown.png' class='imgbikewizard'> " +

                            "<label><input type='checkbox' value=''>Brooks B17, Brown </label>" +
                            "</div> " +

                            "  <div class='checkbox'> " +
                            " <img src='http://shop.larryvsharry.com/media/catalog/product/cache/1/image/9df78eab33525d08d6e5fb8d27136e95/b/l/black_1_3.png' class='imgbikewizard'> " +

                            "<label><input type='checkbox' value=''>Brooks B17, Black  </label>" +
                            "</div> " +

                            "  <div class='checkbox'> " +
                            " <img src='http://shop.larryvsharry.com/media/catalog/product/cache/1/image/9df78eab33525d08d6e5fb8d27136e95/s/a/saddle_brown_1.png' class='imgbikewizard'> " +

                            "<label><input type='checkbox' value=''>Brooks B67, Brown    </label>" +
                            "</div> " +

                            "  <div class='checkbox'> " +
                            " <img src='http://shop.larryvsharry.com/media/catalog/product/cache/1/image/9df78eab33525d08d6e5fb8d27136e95/b/l/black_1_2.png' class='imgbikewizard'> " +
                            "<label><input type='checkbox' value=''>Brooks B67, Black  </label>" +
                            "</div>" +
                            "</div> " +
                            "</div>";
                        console.log(step);
                        break;
                    case 5:
                        document.getElementById("bike-wizard-progress-bar").style.width = '50%';
                        document.getElementById("bike-wizard-text-field").innerHTML =  "<div class='wrapper'>" +
                            "<h1> Step 5 - Accessories</h1>" +
                            " <div class='col-sm-4'>" +
                            "  <div class='checkbox'> " +
                            "<label><input type='checkbox' value=''>Canopy</label>" +
                            "</div> " +
                            "  <div class='checkbox'> " +
                            "<label><input type='checkbox' value=''>Damper kit</label>" +
                            "</div> " +
                            "  <div class='checkbox'> " +
                            "<label><input type='checkbox' value=''>Honeycomb board (HCB)</label>" +
                            "</div> " +
                            "  <div class='checkbox'> " +
                            "<label><input type='checkbox' value=''>Convoy box</label>" +
                            "</div> " +
                            "  <div class='checkbox'> " +
                            "<label><input type='checkbox' value=''>Aluminium box</label>" +
                            "</div> " +
                            "  <div class='checkbox'> " +
                            "<label><input type='checkbox' value=''>Plastic box</label>" +
                            "</div> " +
                            "</div>" +

                            " <div class='col-sm-4'>" +
                            "<h3> BBX </h3>" +
                            "  <div class='radio'> " +
                            "<label><input type='radio' value='optradio'>colour1</label>" +
                            "</div> " +

                            "  <div class='radio'> " +
                            "<label><input type='radio' value='optradio'>colour2</label>" +
                            "</div> " +
                            "  <div class='radio'> " +
                            "<label><input type='radio' value='optradio'>colour3 </label>" +
                            "</div> " +
                            "</div>" +

                            " <div class='col-sm-4'>" +
                            "<h3> Billboard </h3>" +
                            "  <div class='radio'> " +
                            "<label><input type='radio' value='optradio'>1 </label>" +
                            "</div> " +
                            "  <div class='radio'> " +
                            "<label><input type='radio' value='optradio'>2   </label>" +
                            "</div> " +
                            "  <div class='radio'> " +
                            "<label><input type='radio' value='optradio'>3  </label>" +
                            "</div> " +
                            "  <div class='radio'> " +
                            "<label><input type='radio' value='optradio'>4  </label>" +
                            "</div> " +
                            "  <div class='radio'> " +
                            "<label><input type='radio' value='optradio'>5  </label>" +
                            "</div> " +
                            "  <div class='radio'> " +
                            "<label><input type='radio' value='optradio'>6  </label>" +
                            "</div> " +
                            "  <div class='radio'> " +
                            "<label><input type='radio' value='optradio'>7  </label>" +
                            "</div> " +
                            "  <div class='radio'> " +
                            "<label><input type='radio' value='optradio'>8  </label>" +
                            "</div> " +
                            "  <div class='radio'> " +
                            "<label><input type='radio' value='optradio'>9  </label>" +
                            "</div> " +
                            "</div>" +
                            "<p>The BBX side + cover, Foldable seat and Canopy all need the HCB.<p>" +
                            "</div>";
                        console.log(step);
                        break;
                    case 6:
                        document.getElementById("bike-wizard-progress-bar").style.width = '60%';
                        document.getElementById("bike-wizard-text-field").innerHTML = "<div class='wrapper'>" +
                            "<h1> Step 6 - Extras</h1>" +
                            "<div class='col-sm-6'>" +
                            "  <div class='checkbox'> " +
                            "<label><input type='checkbox' value=''>DYNAMO 20\" FRONT WHEEL (ALFINE/ALEX DM24)  </label>" +
                            "</div> " +
                            "  <div class='checkbox'> " +
                            "<label><input type='checkbox' value=''>REELIGHTS </label>" +
                            "</div> " +
                            "  <div class='checkbox'> " +
                            "<label><input type='checkbox' value=''>CROMO KICKSTAND  )</label>" +
                            "</div>" +
                            "</div> " +
                            "<div class='col-sm-6'>" +
                            "  <div class='checkbox'> " +
                            "<label><input type='checkbox' value=''>ABUS 5400 GRANITE U-LOCK</label>" +
                            "</div> " +
                            "  <div class='checkbox'> " +
                            "<label><input type='checkbox' value=''>ABUS BORDO 6500 GRANIT X PLUS  </label>" +
                            "</div> " +
                            "  <div class='checkbox'> " +
                            "<label><input type='checkbox' value=''>ABUS 9100 IVY CHAIN LOCK </label>" +
                            "</div> " +
                            "  <div class='checkbox'> " +
                            "<label><input type='checkbox' value=''>ABUS BORDO + DETECTO 8077 ALARM  </label>" +
                            "</div> " +
                            "</div> " +


                            "</div>";
                        console.log(step);
                        break;
                    case 7:
                        document.getElementById("bike-wizard-progress-bar").style.width = '70%';
                        document.getElementById("bike-wizard-text-field").innerHTML = "<div class='wrapper'>" +
                            "<h1>Step 7 - What you are buying</h1>" +
                            "<p> Here you will find a list of what items you have selected, and recommendations on what you are missing, if anything. <br>" +
                            "Here you can deselect things if you have second thoughts and do not want to buy them. <br> " +
                            "If everything seems to be in order, then just click next and go to the payment site. </p>" +
                            "</div>";
                        console.log(step);
                        break;
                    case 8:
                        document.getElementById("bike-wizard-progress-bar").style.width = '80%';
                        document.getElementById("bike-wizard-text-field").innerHTML = "<div class='wrapper'>" +
                            "<h1>Step 8 - Payment</h1>" +
                            "<p> This is the payment area. Where there will be a form where you can pay. </p>" +
                            "</div>";
                        console.log(step);
                        break;
                    case 9:
                        document.getElementById("bike-wizard-progress-bar").style.width = '90%';
                        document.getElementById("bike-wizard-text-field").innerHTML = "<div class='wrapper'>" +
                            "<h1>Step 9 - Order confirmation</h1>" +
                            "<p> Here you can see you order, that are payed and waiting to be packed and shipped </p>" +
                            "</div>";
                        console.log(step);
                        break;
                    default:
                        console.log(step);
                        // document.getElementById("bike-wizard-progress-bar").style.width = '10%';
                       // document.getElementById("bike-wizard-text-field").innerHTML = "Step 1...";
                        break;

                }
            }

            function updateProgressBar(percent) {
                jQuery("#bike-wizard-progress-bar")[0].innerText = percent;
                jQuery(".progress-bar").animate({
                    width: percent
                }, 1500);
            }

        </script>

<!--        <div class="progress">-->
<!--            <div class="progress-bar" id="bike-wizard-progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:0%">-->
<!--            <span class="sr-only">70% Complete</span>-->
<!--            </div>-->
<!--        </div>-->
<!---->
<!--        <div id="upload-progress" class="progress progress-striped active">-->
<!--            <div class="bar" style="transition:none;"></div>-->
<!--        </div>-->

        <div class="progress">
            <div id="bike-wizard-progress-bar" style="transition:none;" class="progress-bar progress-bar-striped active" role="progressbar"
                 aria-valuenow="0" aria-valuemin="0" aria-valuemax="100""> 0%
            </div>
        </div>


    <br />

        <button type="button" class="btn btn-default" onclick="wizardButtonClickedback()">Back</button>
        <button type="button" class="btn btn-default" onclick="wizardButtonClicked()">Next Step</button>

        <div id="bike-wizard-text-field">
            <br>
            Bullitt’s are as different as the people who ride them and with years of experience, we have developed what we believe to be the ultimate, do-it-all cargo bike.
            <br>
            Designed, built and ridden daily in Copenhagen and across the globe.
            <br>
            9 colour options and a diverse component and accessory line.
            <br>
            With quick delivery and availability, competitive pricing and a highly developed system of components and accessories, the Bullitt is the quickest, most flexible and durable solution currently on the market.
            <br>
            This buyer’s guide is designed to help you choose the correct Bullitt model and pair you with the most appropriate accessories for your needs.
        </div>

        <button type="button" class="btn btn-default" onclick="wizardButtonClickedback()">Back</button>
        <button type="button" class="btn btn-default" onclick="wizardButtonClicked()">Next Step</button>

    <?php
}

add_shortcode('bikewizard', 'showBikeWizard');

?>

