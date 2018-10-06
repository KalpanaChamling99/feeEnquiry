<?php
    include 'header.php';
?>
    <div class='kcmit-page-content'>
        <div class="container">
            <div id="form--" class=''>
                <form action="" method="post">
                    <select name="selprogram">
                        <option value="bim">BIM</option>
                    </select>
                    <select name="selbatch">
                        <option value="14">2014</option>
                        <option value="15">2015</option>
                        <option value="16">2016</option>
                        <option value="17">2017</option>
                    </select>
                    <input type="submit" id= "submit" name="submit" value="View List"/>
                </form>	
                <?php
                    if(isset($_POST['submit']))
                    {
                        $batch = intval($_REQUEST['selbatch']);
                        $program = $_REQUEST['selprogram'];
                        $con = mysqli_connect("localhost","root","","kcmitedu_fee_db") or die("Database Connection Error");
                        if($program == 'bim'){
                            switch($batch){
                                case 14:$start=5591;$end=5649;break;
                                case 15:$start=6330;$end=6391;break;
                                case 16: $start=7137;$end=7198;break;
                                case 17:$start=7900;$end=7946;break;			
                            }
                            
                            $select = "select roll, name, fee_amount from bimstudent where roll between '$start' and '$end'";
                            $result = mysqli_query($con,$select) or die("Selection Error");	
            
                            if(mysqli_num_rows($result)===0){
                                echo "No Records Found";
                                die();
                            }
                            
                            echo "<form>";
                            echo "<div class='kcmit-student-fee-table'><table><caption>BIM 20$batch Batch</caption><thead><tr><th>Roll No</th><th>Name</th><th>Remaining Due</th></tr></thead>";
                            
                                while($arr = mysqli_fetch_assoc($result)){
                                    echo "<td><input type='text' value='".$arr['roll']."'  readonly='readonly'/></td>";
                                    echo "<td><input type='text' value='".$arr['name']."'  readonly='readonly'/></td>";
                                    echo "<td><input type='text' name='".$arr['roll']."' value='".$arr['fee_amount']."' style='text-align:right;' onchange='findStudents(this)' /></td><td id='".$arr['roll']."' style='text-align:center;font-style:italic;color:green'></td>";
                                    echo "</tr><tr>";
                                }
                                echo "</table></div>";
                                echo "</form>";
                        }
                    }	
                ?>
            </div>
        </div>
        </div>
    </div>
<?php
    include 'footer.php'
?>