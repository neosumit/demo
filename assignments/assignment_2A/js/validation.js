/**
 * Created by webwerks1 on 22/3/16.
 */
function firstName()
    {
        fn=document.getElementById("firstname");
        if(fn=="")
            {
                alert("Plesea Enter Firstname");

                document.getElementById('firstname').focus();


            }
        else {
            lastName();
            return true;
        }
    }
function lastName()
{
    ln=document.getElementById("lastname");
    if(ln=="")
    {
        alert("Plesea Enter Lastname");

           document.getElementById('lastname').focus();

        //  document.getElementById('lastname').style.border='1px solid #ff00ff';
    }
 //   Phone();
}
function Phone(ph)
{
    var no=ph.length;
    var patt=/[0-9]/;
    if(ph=="")
    {
        alert("Plesea Enter Phone number");

           document.getElementById('phone').focus();

        //  document.getElementById('firstname').style.border='1px solid #ff00ff';
    }
    else if(isNaN(ph))
    {
        alert("Plesea Enter only NUMBER");
        document.getElementById('phone').focus();
    }
    else if(no!=10)
    {
        alert("please Enter 10 Digit Number");
        document.getElementById('phone').focus();
    }
    offNumber();
}

function offNumber(of)
{
   if(isNaN(of))
   {
       alert("Plesea Enter only NUMBER");
       document.getElementById('office').focus();
   }
}
function emailval(ev)
{
    if(ev=="")
    {
        alert("Plesea Enter Email");

           document.getElementById('email').focus();

        //  document.getElementById('lastname').style.border='1px solid #ff00ff';
    }
    else if((/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/).test(ev))
    {
            return true;
    }
    else
    {
        alert("Plesea Enter Valid Email");
        document.getElementById('email').focus();
    }
    passWord();
}
function passWord(ps)
{
    var str=ps.length;


    if(ps=="")
    {
        alert("Plesea Enter PASSWORD");
        document.getElementById('password').focus();
        return false;
        //   document.getElementById('lastname').focus();

        //  document.getElementById('lastname').style.border='1px solid #ff00ff';
    }
    else if(str < 6 || str > 8)
    {
        alert("Enter password length 6-8");
        document.getElementById('password').focus();
        return false;
    }
    else if((/[^a-zA-Z0-9\-\/]/.test(ps)))
    {

        alert("Used only Charaters");
        return false;
    }
    comPass();

}
function comPass(cp)
{
    var pass=document.getElementById('password').value;
    if(cp=="")
    {
        alert("Plesea Enter PASSWORD");

           document.getElementById('compass').focus();

        //  document.getElementById('lastname').style.border='1px solid #ff00ff';
    }
    else if(cp!=pass)
    {
        alert("Passowrd not Match");
        document.getElementById('compass').focus();
    }
    mnt();
}

function mnt(mm)
{

    if(mm==0)
    {
        alert("Select Month");
         document.getElementById('month').focus();
    }
    dt();

}
function dt(dd)
{


    if(dd==0)
    {
        alert("Select Day");
        document.getElementById('day').focus();
    }

    years();
}


function years(yy)
{
    if(yy==0)
    {
        alert("Select Year");
        document.getElementById('year').focus();
    }
    else
    {
        act();
        return true;
    }
    function act()
    {
        var year_select=document.getElementById('year');
        var select=year_select.value;

        var x=(2016-select);
        if(x>26)
        {

            document.getElementById('age').value=x;
            // document.getElementById("age").style.border='1px solid gray';
        }
        else
        {
            alert('Age is below 26YEar')
            document.getElementById('age').value='';
            document.getElementById('age').focus();

            //  document.getElementById('age').style.border='1px solid #ff00ff';
            //  document.getElementById('age').disabled=true;
        }
    }
    box();
}

//box
function box(form)
{

    if ( ( form.check[0].checked == false ) && ( form.check[1].checked == false ) && ( form.check[2].checked == false )  )
    {
        alert ( "Please choose Your interest" );

        document.getElementsByClassName('checkbox').style.border='1px solid #ff00ff';
        return false;
    }
    about();

}
//about
function about(ab)
{
    if(ab=="")
    {
        alert("Plesea Enter Aboutus");

        document.getElementById('about').focus();
    }
}