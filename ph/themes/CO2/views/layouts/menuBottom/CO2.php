
<div class="toolbar-bottom shadow2 font-montserrat">

    <button class="btn btn-default lbh tooltips" data-hash="#home"
            data-placement="top" data-original-title="Page d'accueil">
        <i class="fa fa-home" style="font-size: 19px;"></i>
    </button>
    
    <button class="btn btn-default tooltips letter-red" id="show-bottom-app">
        <i class="fa fa-th" style="font-size: 19px;"></i>
    </button>

    <button class="btn btn-default letter-green" id="show-bottom-add" >
        <i class="fa fa-plus-circle"  style="font-size: 19px;"></i> <!-- <span class="hidden-xs"><?php echo Yii::t("common", "add") ?> --></span>
    </button>
    <button class="btn btn-default letter-blue btn-show-map">
        <i class="fa fa-map-marker" style="font-size: 19px;"></i> <!-- <span class="hidden-xs"><?php echo Yii::t("common", "map") ?></span> -->
    </button>
    <!-- <button class="btn btn-default">
        <i class="fa fa-comments"></i> messagerie
    </button>
    <button class="btn btn-default">
        <i class="fa fa-connectdevelop"></i> contacts
    </button> -->
    <!-- <button class="btn btn-default">
        <i class="fa fa-cogs"></i> 
    </button> -->
    <a href="https://www.helloasso.com/associations/open-atlas/collectes/communecter/don" target="_blank"
            data-placement="top" data-original-title="Participer au financement du réseau"
            class="btn btn-default letter-pink tooltips">
            <!-- <i class="fa fa-chain" data-alt="eye-dropper"></i>  -->
            <i class="fa fa-gift" style="font-size: 19px;"></i> <span class="hidden-xs"><?php echo Yii::t("common", "co-tribuer") ?></span>
    </a>

    <a class="btn btn-default tooltips lbh" href="#info.p.stats"
             data-placement="top" data-original-title="Statistiques : visualiser la fréquentation quotidienne du réseau">
        <i class="fa fa-bar-chart" style="font-size: 19px;"></i>
    </a>
    <a class="btn btn-default tooltips lbh" href="#coBugs"
             data-placement="top" data-original-title="Déclarer un bug">
        <i class="fa fa-bug" style="font-size: 19px;"></i>
    </a>
    <a class="btn btn-default lbh tooltips" href="#default.view.page.index.dir.docs" 
             data-placement="top" data-original-title="Documentation : en savoir + sur Communecter !">
        <i class="fa fa-book" style="font-size: 19px;"></i>
    </a>
    
    <!-- <button class="btn btn-default"  id="show-bottom-quickaxe" style="width:50px;">
        <img src="<?php echo $this->module->assetsUrl."/images/thumb/run.png"?>" width=20/>
    </button> -->

    <button class="btn btn-default bg-blue-k" style="width:50px;" onclick="KScrollTo('.main-container')">
        <i class="fa fa-chevron-up"></i>
    </button>

</div>

<div class="toolbar-bottom-apps shadow2 font-montserrat hidden">

    <a class="btn btn-default lbh letter-red" href="#search">
        <i class="fa fa-search"></i> 
        <span class="hidden-xs"><?php echo Yii::t("common", "Search") ?></span> 
    </a>
    <a class="btn btn-default lbh letter-red" href="#live">
        <i class="fa fa-newspaper-o"></i> 
        <span class="hidden-xs"><?php echo Yii::t("common", "In live") ?></span> 
    </a>
    <a class="btn btn-default lbh letter-red" href="#agenda">
        <i class="fa fa-calendar"></i> 
        <span class="hidden-xs"><?php echo Yii::t("common", "Agenda") ?></span> 
    </a>
    <a class="btn btn-default lbh letter-red" href="#annonces">
        <i class="fa fa-bullhorn"></i> 
        <span class="hidden-xs"><?php echo Yii::t("common", "Market place") ?></span> 
    </a>
    <a class="btn btn-default lbh letter-red" href="#ressources">
        <i class="fa fa-cubes"></i> 
        <span class="hidden-xs"><?php echo Yii::t("common", "Sharing") ?></span> 
    </a>

</div>

<!-- <div class="toolbar-bottom-quickaccess toolbar-bottom-fullwidth shadow2 font-montserrat hidden"></div> -->

<div class="toolbar-bottom-adds toolbar-bottom-fullwidth shadow2 font-montserrat hidden">
    
    <a href="#element.invite" class="btn-open-form btn btn-default text-yellow lbhp inline-block margin-bottom-10"> 
        <i class="fa fa-user"></i> 
        <span class="hidden-xs"><?php echo Yii::t("common","Invite someone") ?></span>
    </a><br/>
    <a href="javascript:;" data-form-type="organization" data-form-subtype="<?php echo Organization::TYPE_NGO; ?>" class="btn-open-form btn btn-default text-green inline-block margin-bottom-10"> 
        <i class="fa fa-group"></i> 
        <span class="hidden-xs"><?php echo Yii::t("common","NGO") ?></span>
    </a><br/>
    <a href="javascript:;" data-form-type="organization" data-form-subtype="<?php echo Organization::TYPE_BUSINESS; ?>" class="btn-open-form btn btn-default text-azure inline-block margin-bottom-10"> 
        <i class="fa fa-building"></i> 
        <span class="hidden-xs"><?php echo Yii::t("common","Enterprise") ?></span>
    </a><br/>
    <a href="javascript:;" data-form-type="organization" data-form-subtype="<?php echo Organization::TYPE_GROUP; ?>" class="btn-open-form btn btn-default text-turq inline-block margin-bottom-10"> 
        <i class="fa fa-circle"></i> 
        <span class="hidden-xs"><?php echo Yii::t("common","Group") ?></span>
    </a><br/>
    <a href="javascript:;" data-form-type="event" class="btn-open-form btn btn-default text-orange inline-block margin-bottom-10"> 
        <i class="fa fa-calendar"></i> 
        <span class="hidden-xs"><?php echo Yii::t("common","Event") ?></span>
    </a><br/>
    <a href="javascript:;" data-form-type="project" class="btn-open-form btn btn-default text-purple inline-block margin-bottom-10"> 
        <i class="fa fa-lightbulb-o"></i> 
        <span class="hidden-xs"><?php echo Yii::t("common","Project") ?></span>
    </a><br/>
    <a href="javascript:;" data-form-type="organization" data-form-subtype="<?php echo Organization::TYPE_GOV; ?>" class="btn-open-form btn btn-default text-red inline-block margin-bottom-10"> 
        <i class="fa fa-university"></i> 
        <span class="hidden-xs"><?php echo Yii::t("common","Governemental organization") ?></span>
    </a><br/>
    <a href="javascript:;" data-form-type="classifieds" class="btn-open-form btn btn-default text-azure inline-block margin-bottom-10"> 
        <i class="fa fa-bullhorn"></i> 
        <span class="hidden-xs"><?php echo Yii::t("common","Classified") ?></span>
    </a><br/>
    <a href="javascript:;" data-form-type="ressources" class="btn-open-form btn btn-default text-vine inline-block margin-bottom-10"> 
        <i class="fa fa-cubes"></i> 
        <span class="hidden-xs"><?php echo Yii::t("common","Ressource") ?></span>
    </a><br/>
    <a href="javascript:;" data-form-type="poi" class="btn-open-form btn btn-default text-brown inline-block margin-bottom-10"> 
        <i class="fa fa-map-marker"></i> 
        <span class="hidden-xs"><?php echo Yii::t("common","Point of interest") ?></span>
    </a>
</div>

<script type="text/javascript">
jQuery(document).ready(function() {

    $(".toolbar-bottom-apps").hide().removeClass("hidden");
    $('#show-bottom-app').off().click(function(){
        $(".toolbar-bottom-apps").toggle(100);
        $(".toolbar-bottom-adds").hide(200);
        $('.toolbar-bottom-apps .btn').click(function(){
            console.log(".toolbar-bottom-apps btn click");
            $(".toolbar-bottom-apps").hide(200);
        });
    });
    $('.toolbar-bottom-apps').unbind("mouseleave").mouseleave(function(){
        console.log(".toolbar-bottom-apps mouseleave");
        $(".toolbar-bottom-apps").hide(200);
    });


    $(".toolbar-bottom-adds").hide().removeClass("hidden");
    $('#show-bottom-add').off().click(function(){
        $(".toolbar-bottom-apps").hide(200);
        $(".toolbar-bottom-adds").toggle(100);
        $('.toolbar-bottom-adds .btn').click(function(){
            $(".toolbar-bottom-adds").hide(200);
        });
    });
    $('.toolbar-bottom-adds').unbind("mouseleave").mouseleave(function(){
        console.log(".toolbar-bottom-adds mouseleave");
        $(".toolbar-bottom-adds").hide(200);
    });
/*
    $(".toolbar-bottom-quickaccess").hide().removeClass("hidden");
    $('#show-bottom-quickaxe').off().click(function(){
        $(".toolbar-bottom-apps,.toolbar-bottom-adds").hide(200);
        $(".toolbar-bottom-quickaccess").toggle(100);
        $('.toolbar-bottom-quickaccess .btn').click(function(){
            $(".toolbar-bottom-adds").hide(200);
        });
    });
    $('.toolbar-bottom-quickaccess').unbind("mouseleave").mouseleave(function(){
        console.log(".toolbar-bottom-quickaccess mouseleave");
        $(".toolbar-bottom-quickaccess").hide(200);
    }); */
})

</script>