
        <footer id='footer'>
            <p>copyright &copy 2018 KCMIT. All Right Reserved</p>
        </footer>

        <script>
            function view(data)
            {
                var roll = data.value;
                if(roll == "")
                {
                    document.getElementById('reply').innerHTML="Enter Roll No";
                    return;
                }
                else{
                    var ob = new XMLHttpRequest();
                    ob.onreadystatechange = function(){
                        if(this.readyState == 4 && this.status == 200)
                            document.getElementById('reply').innerHTML = this.responseText;
                    };
                    ob.open("GET","getFee.php?p=bim&roll="+roll,true);
                    // ob.open("GET","getFee.php?p=bba&roll="+roll,true);
                    ob.send();
                }
            }
        </script>
        <script>
            function viewBBA(data)
            {
                var roll = data.value;
                if(roll == "")
                {
                    document.getElementById('reply').innerHTML="Enter Roll No";
                    return;
                }
                else{
                    var ob = new XMLHttpRequest();
                    ob.onreadystatechange = function(){
                        if(this.readyState == 4 && this.status == 200)
                            document.getElementById('reply').innerHTML = this.responseText;
                    };
                    ob.open("GET","getFee.php?p=bba&roll="+roll,true);
                    ob.send();
                }
            }
        </script>
        <script src='assets/src/js/jquery.js'></script>
        <script src='assets/src/js/main.js'></script>
    </body>
</html>