function NoVisible()
    {
        const CB_tech=document.getElementById("CB_tech");
        const CB_meca=document.getElementById("CB_meca");

        if(CB_tech.checked === true)
        {
            CB_meca.disabled = false;
        }
        else
        {
            CB_meca.disabled = true;
        }
    }
 function video()
 {
         document.getElementById("video").play();

 }