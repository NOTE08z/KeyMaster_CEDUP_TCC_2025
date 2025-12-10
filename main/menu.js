class MenuButton {

    constructor(menuButton,navList,navLinks,openMenu){

        this.menuButton = document.querySelector(menuButton);
        this.navList =document.querySelector(navList);
        this.navLinks =document.querySelectorAll(navLinks);
        this.openMenu=document.querySelector(openMenu);
        this.activeClass = "active";
        this.click = this.click.bind(this);
    }

click(){
this.navList.classList.toggle(this.activeClass);
}
addClickEvent(){
this.menuButton.addEventListener("click",this.click);
this.openMenu.addEventListener("click",this.click);
}
init(){
if(this.menuButton){
this.addClickEvent();
}
return this;
}
}

const menuButton = new MenuButton(
".menu-button",
".nav-list",
".nav-list li",
".open-menu"
);
menuButton.init();
window.addEventListener("load",function(){
document.getElementById("open-menu").style.display="none";
});
menuButton.menuButton.addEventListener('click',toggle);
menuButton.openMenu.addEventListener('click',toggle);



function toggle(){
if(document.getElementById("open-menu").style.display =="none"){
document.getElementById("open-menu").style.display="block";
document.getElementById("menu-button").style.display="none";
}
else{
document.getElementById("open-menu").style.display="none";
document.getElementById("menu-button").style.display="block";
}
}