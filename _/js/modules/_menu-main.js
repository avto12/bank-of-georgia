document.addEventListener('DOMContentLoaded', (event) => {
    const menuMain = document.querySelector('.menu-main');
    const openMenuMain = document.querySelectorAll('.open-menu-main');
    openMenuMain.forEach(item => {
        item.addEventListener('click', function () {
            menuMain.classList.add('menu-main--open');
        });
    });

    // Sub Menu ON click in off-canvas
    let subMenuLink = document.getElementsByClassName("menu-header-open-js");
    let mainMenuList = document.getElementById("mainMenuList");
    let subMenuTitle = document.getElementsByClassName("menu-header-close-js");
    let menuSecondary = document.getElementById("menuSecondary");

    let subMenuShow = function() {
        let attribute = this.parentElement.getAttribute("data-target-submenu");
        let subMenuContent = document.getElementById(attribute);

        subMenuContent.classList.add("menu-show");
        mainMenuList.classList.add("menu-hide");
        menuSecondary.classList.add("menu-hide");
    };

    let subMenuHide = function() {
        this.parentElement.classList.remove("menu-show");
        mainMenuList.classList.remove("menu-hide");
        menuSecondary.classList.remove("menu-hide");
    }

    for (let i = 0; i < subMenuLink.length; i++) {
        subMenuLink[i].addEventListener('click', subMenuShow, false);
    }

    for (let i = 0; i < subMenuTitle.length; i++) {
        subMenuTitle[i].addEventListener('click', subMenuHide, false);
    }
    // Sub Menu ON click in off-canvas END

    // Sub Menu ON click in Block
    let subMenuLinkBlock = document.getElementsByClassName("menu-block-open-js");
    let mainMenuListBlock = document.getElementById("blockMenuList");
    let subMenuTitleBlock = document.getElementsByClassName("menu-block-close-js");
    let menuSecondaryBlock = document.getElementById("blockMenuSecondary");

    let subMenuShowBlock = function() {
        let attribute = this.parentElement.getAttribute("data-target-submenu");
        let subMenuContent = document.getElementById(attribute);

        subMenuContent.classList.add("menu-show");
        mainMenuListBlock.classList.add("menu-hide");
        menuSecondaryBlock.classList.add("menu-hide");
    };

    let subMenuHideBlock = function() {
        this.parentElement.parentElement.classList.remove("menu-show");
        mainMenuListBlock.classList.remove("menu-hide");
        menuSecondaryBlock.classList.remove("menu-hide");
    }

    for (let i = 0; i < subMenuLinkBlock.length; i++) {
        subMenuLinkBlock[i].addEventListener('click', subMenuShowBlock, false);
    }

    for (let i = 0; i < subMenuTitleBlock.length; i++) {
        subMenuTitleBlock[i].addEventListener('click', subMenuHideBlock, false);
    }
});