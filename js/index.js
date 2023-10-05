let toggle = true;
function advancedSearch()
{
    elements = document.querySelectorAll('.advanced-search * ');
    for (let element of elements)
    {
        element.disabled = !toggle;
        if (element.disabled)
        {
            element.classList.add('hide');
        }
        else{
            element.classList.remove('hide');

        }
    }
    toggle = !toggle;

}