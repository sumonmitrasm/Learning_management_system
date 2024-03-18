const handleThemeUpdate = (cssVars) => {
    const root = document.querySelector(':root');
    const keys = Object.keys(cssVars);
    keys.forEach(key => {
        root.style.setProperty(key, cssVars[key]);
    });
}

function dynamicPrimaryColor(primaryColor) {
    'use strict'
    
    primaryColor.forEach((item) => {
        item.addEventListener('input', (e) => {
            const cssPropName = `--primary-${e.target.getAttribute('data-id')}`;
            const cssPropName1 = `--primary-${e.target.getAttribute('data-id1')}`;
            const cssPropName2 = `--primary-${e.target.getAttribute('data-id2')}`;
            handleThemeUpdate({
                [cssPropName]: e.target.value,
                // 95 is used as the opacity 0.95  
                [cssPropName1]: e.target.value + 95,
                [cssPropName2]: e.target.value,
            });
        });
    });
}

function dynamicPrimaryBackground(bgColor) {
    bgColor.forEach((item) => {
        item.addEventListener('input', (e) => {
            const cssPropName3 = `--dark-${e.target.getAttribute('data-id3')}`;
            const cssPropName4 = `--dark-${e.target.getAttribute('data-id4')}`;
            handleThemeUpdate({
                [cssPropName3]: e.target.value+ 'dd',
                [cssPropName4]: e.target.value,
            });
        });
    });
}

(function() {
    'use strict'

    // Light theme color picker 
    const dynamicPrimaryLight = document.querySelectorAll('input.color-primary-light');
    
    const dynamicBackground = document.querySelectorAll('input.background-primary-light');

    // themeSwitch(LightThemeSwitchers);
    dynamicPrimaryColor(dynamicPrimaryLight);
    dynamicPrimaryBackground(dynamicBackground);

    localStorageBackup();
        
})();

function localStorageBackup() {
    'use strict'

    // if there is a value stored, update color picker and background color
    // Used to retrive the data from local storage
    if (localStorage.dashticprimaryColor) {
        // document.getElementById('colorID').value = localStorage.dashticprimaryColor;
        document.querySelector('html').style.setProperty('--primary-bg-color', localStorage.dashticprimaryColor);
        document.querySelector('html').style.setProperty('--primary-bg-hover', localStorage.dashticprimaryHoverColor);
        document.querySelector('html').style.setProperty('--primary-bg-border', localStorage.dashticprimaryBorderColor);
    }

    if (localStorage.dashticbgColor) {
        // document.getElementById('bgID').value = localStorage.dashticthemeColor;
        document.querySelector('html').style.setProperty('--dark-body', localStorage.dashticbgColor);
        document.querySelector('html').style.setProperty('--dark-theme', localStorage.dashticthemeColor);
        document.body.classList.add('dark-mode');
        document.body.classList.remove('light-mode');
        document.body.classList.remove('light-menu');
        document.body.classList.remove('dark-menu');
        document.body.classList.remove('color-menu');
        document.body.classList.remove('light-header');
        document.body.classList.remove('dark-header');
        document.body.classList.remove('color-header');
        $('#myonoffswitch2').prop('checked', true);
        $('#myonoffswitch1').prop('checked', false);
        $('#myonoffswitch4').prop('checked', true);
        $('#myonoffswitch7').prop('checked', true);
    }

    if(localStorage.dashticlightMode){
        document.querySelector('body')?.classList.add('light-mode');
		document.querySelector('body')?.classList.remove('dark-mode');
        $('#myonoffswitch1').prop('checked', true);
        $('#myonoffswitch3').prop('checked', true);
        $('#myonoffswitch6').prop('checked', true);
    }

    if(localStorage.dashticdarkMode){
        document.querySelector('body')?.classList.remove('light-mode');
		document.querySelector('body')?.classList.add('dark-mode');
        $('#myonoffswitch2').prop('checked', true);
        $('#myonoffswitch5').prop('checked', true);
        $('#myonoffswitch8').prop('checked', true);
    }

    if(localStorage.dashtichorizontal){
        document.querySelector('body').classList.add('horizontal')
    }

    if(localStorage.dashtichorizontalHover){
        document.querySelector('body').classList.add('horizontal-hover')
    }

    if(localStorage.dashticrtl){
        document.querySelector('body').classList.add('rtl')
    }

    if(localStorage.dashticclosedmenu){
        document.querySelector('body').classList.add('closed-menu')
    }

    if(localStorage.dashticicontextmenu){
        document.querySelector('body').classList.add('icontext-menu')
    }

    if(localStorage.dashticsideiconmenu){
        document.querySelector('body').classList.add('sideicon-menu')
    }

    if(localStorage.dashtichoversubmenu){
        document.querySelector('body').classList.add('hover-submenu')
    }

    if(localStorage.dashtichoversubmenu1){
        document.querySelector('body').classList.add('hover-submenu1')
    }

    if(localStorage.dashticbodystyle){
        document.querySelector('body').classList.add('body-style1')
    }

    if(localStorage.dashticboxedwidth){
        document.querySelector('body').classList.add('layout-boxed')
    }

    if(localStorage.dashticscrollable){
        document.querySelector('body').classList.add('scrollable-layout')
    }

    if(localStorage.dashticlightmenu){
        document.querySelector('body').classList.add('light-menu')
    }

    if(localStorage.dashticcolormenu){
        document.querySelector('body').classList.add('color-menu')
    }

    if(localStorage.dashticdarkmenu){
        document.querySelector('body').classList.add('dark-menu')
    }

    if(localStorage.dashticlightheader){
        document.querySelector('body').classList.add('light-header')
    }

    if(localStorage.dashticcolorheader){
        document.querySelector('body').classList.add('color-header')
    }

    if(localStorage.dashticdarkheader){
        document.querySelector('body').classList.add('dark-header')
    }
}

// triggers on changing the color picker
function changePrimaryColor() {
    'use strict'
    checkOptions();

    var userColor = document.getElementById('colorID').value;
    localStorage.setItem('dashticprimaryColor', userColor);
    // to store value as opacity 0.95 we use 95
    localStorage.setItem('dashticprimaryHoverColor', userColor + 95);
    localStorage.setItem('dashticprimaryBorderColor', userColor);

    names()
}

function changeBackgroundColor() {

    var userColor = document.getElementById('bgID').value;
    localStorage.setItem('dashticbgColor', userColor + 'dd');
    localStorage.setItem('dashticthemeColor', userColor);
    names();

    document.body.classList.add('dark-mode');
    document.body.classList.remove('light-mode');
    document.body.classList.remove('light-menu');
    document.body.classList.remove('dark-menu');
    document.body.classList.remove('color-menu');
    document.body.classList.remove('light-header');
    document.body.classList.remove('dark-header');
    document.body.classList.remove('color-header');
    $('#myonoffswitch2').prop('checked', true);
    $('#myonoffswitch1').prop('checked', false);
    $('#myonoffswitch4').prop('checked', true);
    $('#myonoffswitch7').prop('checked', true);
}


// to check the value is hexa or not
const isValidHex = (hexValue) => /^#([A-Fa-f0-9]{3,4}){1,2}$/.test(hexValue)

const getChunksFromString = (st, chunkSize) => st.match(new RegExp(`.{${chunkSize}}`, "g"))
    // convert hex value to 256
const convertHexUnitTo256 = (hexStr) => parseInt(hexStr.repeat(2 / hexStr.length), 16)
    // get alpha value is equla to 1 if there was no value is asigned to alpha in function
const getAlphafloat = (a, alpha) => {
        if (typeof a !== "undefined") { return a / 255 }
        if ((typeof alpha != "number") || alpha < 0 || alpha > 1) {
            return 1
        }
        return alpha
    }
    // convertion of hex code to rgba code 
function hexToRgba(hexValue, alpha) {
    'use strict'

    if (!isValidHex(hexValue)) { return null }
    const chunkSize = Math.floor((hexValue.length - 1) / 3)
    const hexArr = getChunksFromString(hexValue.slice(1), chunkSize)
    const [r, g, b, a] = hexArr.map(convertHexUnitTo256)
    return `rgba(${r}, ${g}, ${b}, ${getAlphafloat(a, alpha)})`
}


let myVarVal

function names() {
    'use strict'

    let primaryColorVal = getComputedStyle(document.documentElement).getPropertyValue('--primary-bg-color').trim();

    //get variable
    myVarVal = localStorage.getItem("dashticprimaryColor")  || primaryColorVal;


    // index charts
    if(document.querySelector('#leads') !== null){
        index1();
    }
    if(document.querySelector('#vmap') !== null){
        vectormap();
    }
    if(document.querySelector('#spark1') !== null){
        spark1();
    }

    // index2 charts
    if(document.querySelector('#myfirstchart') !== null){
        myfirstchart();
    }
    if(document.querySelector('.canvasDoughnut') !== null){
        canvasDoughnut();
    }
    if(document.querySelector('#chart-circle-primary') !== null){
        chartcircleprimary();
    }

    // index3 charts
    if(document.querySelector('#projectInvestment') !== null){
        projectInvestment();
    }
    if(document.querySelector('.canvasDoughnut2') !== null){
        canvasDoughnut2();
    }
    if(document.querySelector('#expense') !== null){
        expense();
    }

    // index4 charts
    if(document.querySelector('.canvasDoughnut3') !== null){
        canvasDoughnut3();
    }
    if(document.querySelector('#projectTracked') !== null){
        projectTracked();
    }
    if(document.querySelector('#chart-circle-primary1') !== null){
        chartcircleprimary1();
    }
    if(document.querySelector('#chart-circle-primary2') !== null){
        chartcircleprimary2();
    }
    if(document.querySelector('#chart-circle-primary3') !== null){
        chartcircleprimary3();
    }

    // index5 charts
    if(document.querySelector('#cryptotrading') !== null){
        cryptotrading();
    }
    if(document.querySelector('#CryptoChart1') !== null){
        cryptoChart1();
    }



    let colorData1 = hexToRgba(myVarVal || primaryColorVal , 0.1)
    document.querySelector('html').style.setProperty('--primary01', colorData1);

    let colorData2 = hexToRgba(myVarVal || primaryColorVal , 0.2)
    document.querySelector('html').style.setProperty('--primary02', colorData2);

    let colorData3 = hexToRgba(myVarVal || primaryColorVal , 0.3)
    document.querySelector('html').style.setProperty('--primary03', colorData3);

    let colorData4 = hexToRgba(myVarVal || primaryColorVal , 0.4)
    document.querySelector('html').style.setProperty('--primary04', colorData4);

    let colorData5 = hexToRgba(myVarVal || primaryColorVal , 0.5)
    document.querySelector('html').style.setProperty('--primary05', colorData5);

    let colorData6 = hexToRgba(myVarVal || primaryColorVal , 0.6)
    document.querySelector('html').style.setProperty('--primary06', colorData6);

    let colorData7 = hexToRgba(myVarVal || primaryColorVal , 0.7)
    document.querySelector('html').style.setProperty('--primary07', colorData7);

    let colorData8 = hexToRgba(myVarVal || primaryColorVal , 0.8)
    document.querySelector('html').style.setProperty('--primary08', colorData8);

    let colorData9 = hexToRgba(myVarVal || primaryColorVal , 0.9)
    document.querySelector('html').style.setProperty('--primary09', colorData9);

    let colorData05 = hexToRgba(myVarVal || primaryColorVal , 0.05)
    document.querySelector('html').style.setProperty('--primary005', colorData05);

}

names()

