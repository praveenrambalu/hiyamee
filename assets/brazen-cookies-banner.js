let acceptedCookiePolicyCookieName = "accepted-cookie-policy";
let cookieBannerId = "bcCookieBanner";
let bcCookieBannerDiv = document.createElement('div');

$(document).ready(function ()
{
    let acceptedCookiePolicyCookie = hasAcceptedCookiePolicyCookie(acceptedCookiePolicyCookieName);
    if (!acceptedCookiePolicyCookie)
    {
        initCookieBanner();

        setInterval(function ()
        {
            adjustBodyMarginTopToBannerHeight();
        }, 1000);
    }
})

function initCookieBanner()
{
    //create html starts
    bcCookieBannerDiv.setAttribute("id", cookieBannerId);

    let innerDiv = document.createElement('div');
    innerDiv.classList.add("inner");
    bcCookieBannerDiv.appendChild(innerDiv);

    let textDiv = document.createElement('div');
    textDiv.classList.add("text");
    let actionsDiv = document.createElement('div');
    actionsDiv.classList.add("actions");
    innerDiv.appendChild(textDiv);
    innerDiv.appendChild(actionsDiv);

    let contentP = document.createElement('p');
    contentP.classList.add("hidden-xs");
    let textNode1 = document.createTextNode("We use cookies to make using our websites and services easy and " +
            "meaningful and to better understand how they're used so we can make them better. You can review our ");
    let policyAnchor = document.createElement('a');
    policyAnchor.setAttribute("href", "https://www.brazen.com/privacy");
    policyAnchor.setAttribute("target", "_blank");
    policyAnchor.text = "privacy policy";
    let textNode2 = document.createTextNode(" for more information. By continuing to use this site you " +
            "are giving us consent to do this.");
    contentP.appendChild(textNode1);
    contentP.appendChild(policyAnchor);
    contentP.appendChild(textNode2);
    textDiv.appendChild(contentP);

    let mobileContentP = document.createElement('p');
    mobileContentP.classList.add("visible-xs");
    let mobileTextNode1 = document.createTextNode("This site uses cookies. See ");
    let mobilePolicyAnchor = document.createElement('a');
    mobilePolicyAnchor.setAttribute("href", "https://www.brazen.com/privacy");
    mobilePolicyAnchor.setAttribute("target", "_blank");
    mobilePolicyAnchor.text = "privacy policy";
    let mobileTextNode2 = document.createTextNode(" for more info.");
    mobileContentP.appendChild(mobileTextNode1);
    mobileContentP.appendChild(mobilePolicyAnchor);
    mobileContentP.appendChild(mobileTextNode2);
    textDiv.appendChild(mobileContentP);

    let acceptButton = document.createElement('button');

    // This ID is used to dismiss the cookie banner in the load client.  If you change it's value here, you need
    // to change it in ElementId.java
    acceptButton.id = "COOKIE_ACCEPT_BUTTON";
    acceptButton.setAttribute("class", "btn btn-outlined btn-close");
    acceptButton.innerHTML = "Accept";
    acceptButton.addEventListener('click', function(){
        $(bcCookieBannerDiv).remove();
        document.body.style.marginTop = 0;
        setEnvironmentCookie(acceptedCookiePolicyCookieName, "true");
    })
    actionsDiv.appendChild(acceptButton);

    document.body.appendChild(bcCookieBannerDiv);
    //create html ends


    window.addEventListener('resize', function()
    {
        adjustBodyMarginTopToBannerHeight();
    });
};

function adjustBodyMarginTopToBannerHeight()
{
    if (bcCookieBannerDiv != null && bcCookieBannerDiv.offsetHeight > 0)
    {
        document.body.style.marginTop = bcCookieBannerDiv.offsetHeight + "px";
        bcCookieBannerDiv.classList.add("in");
        return true;
    }
    else
    {
        return false;
    }
}

function setEnvironmentCookie(name, value) {
    let today = new Date();
    let expire = new Date();
    expire.setTime(today.getTime() + 3600000*24*365); //expire in one year

    let cookieNameWithEnvironment = getEnvironmentCookieKey(name);
    document.cookie = cookieNameWithEnvironment + "=" + (value || "")  +
            "; expires=" + expire.toGMTString() + "; path=/";
}

function hasAcceptedCookiePolicyCookie(name)
{
    let allCookieValue = getAllEnvironmentCookieValue(name);
    let environmentCookieValue = getEnvironmentCookieValue(name);
    let valueSet = allCookieValue === "true" || environmentCookieValue === "true";
    return valueSet
}

function getAllEnvironmentCookieValue(name) {
    let cookieNameWithEnvironment = "all-" + name;

    let value = "; " + document.cookie;
    let parts = value.split("; " + cookieNameWithEnvironment + "=");
    if (parts.length == 2) {
        return parts.pop().split(";").shift();
    }
}

function getEnvironmentCookieValue(name) {
    let cookieNameWithEnvironment = getEnvironmentCookieKey(name);

    let value = "; " + document.cookie;
    let parts = value.split("; " + cookieNameWithEnvironment + "=");
    if (parts.length == 2) {
        return parts.pop().split(";").shift();
    }
}

function getEnvironmentCookieKey(name) {
    let hostName = window.location.hostname;
    let subDomain = hostName.split('.')[0];
    let environment = subDomain.split('-').length > 1 ? subDomain.split('-')[1] : "app";
    let cookieNameWithEnvironment = environment + "-" + name;

    return cookieNameWithEnvironment;
}