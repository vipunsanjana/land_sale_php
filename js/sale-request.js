function submitReport(url)
{
    let form = document.getElementById('report-form');
    let data = new FormData(form);

    fetch(url, {
        method: "post",
        body: data
    })
    .then(response => response.json())
    .then(json => {
        console.log(json);
        if (json.success)
        {
            hideReportForm();
            showReportSuccess();
        }
    });

}

function save(url)
{
    let form = document.getElementById('save-form');
    let data = new FormData(form);

    fetch(url, {
        method: "post",
        body: data
    })
    .then(response => response.json())
    .then(json => {
        console.log(json);
        if (json.success)
        {
            document.getElementById('btn-save').classList.add('hide');
            document.getElementById('btn-unsave').classList.remove('hide');
        }
    });
}

function unsave(url)
{
    let form = document.getElementById('unsave-form');
    let data = new FormData(form);

    fetch(url, {
        method: "post",
        body: data
    })
    .then(response => response.json())
    .then(json => {
        console.log(json);
        if (json.success)
        {
            document.getElementById('btn-unsave').classList.add('hide');
            document.getElementById('btn-save').classList.remove('hide');
        }
    });
}

let pos = 0;
function changeImage(num)
{
    let images =  document.querySelectorAll('.slide-show .image');

    pos += num;

    if (pos > images.length - 1 )
    {
        pos = 0;
    }
    else if (pos < 0)
    {
        pos = images.length - 1;
    }

    for (let image of images)
    {
        image.classList.add('hide');
    }
    console.log(pos)
    images[pos].classList.remove('hide');

    
}

function showReportForm()
{
    document.getElementById('report-post').style.display = 'block';
    document.getElementById('container').classList.add('blur');
}

function hideReportForm()
{
    document.getElementById('report-post').style.display = 'none';
    document.getElementById('container').classList.remove('blur');
}

function showReportSuccess()
{
    document.getElementById('report-success').style.display = 'grid';
    document.getElementById('container').classList.add('blur');
}

function hideReportSuccess()
{
    document.getElementById('report-success').style.display = 'none';
    document.getElementById('container').classList.remove('blur');
}

