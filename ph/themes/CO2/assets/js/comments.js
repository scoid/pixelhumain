
function initCommentsTools(thisMedias){ 
  //ajoute la barre de commentaire & vote up down signalement sur tous les medias
  $.each(thisMedias, function(key, media){
    if(typeof media._id != "undefined"){
        media.target = "news"; 
        
        var commentCount = 0;
        idMedia=media._id['$id']; //console.log("idMedia",idMedia);
        idMediaShare=media._id['$id']; //console.log("idMedia",idMedia);
        var typeMediaShare = "news";
        if(media.type=="activityStream") {
          idMediaShare = media.object.id;
          typeMediaShare = media.object.type;
        }

        if ("undefined" != typeof media.commentCount) 
          commentCount = media.commentCount;
        
        idSession = typeof idSession != "undefined" ? idSession : false;

        var lblCommentCount = '';
        if(commentCount == 0 && idSession) lblCommentCount = "<i class='fa fa-comment'></i>  Commenter";
        if(commentCount == 1) lblCommentCount = "<i class='fa fa-comment'></i> <span class='nbNewsComment'>" + commentCount + "</span> commentaire";
        if(commentCount > 1) lblCommentCount = "<i class='fa fa-comment'></i> <span class='nbNewsComment'>" + commentCount + "</span> commentaires";
        if(commentCount == 0 && !idSession) lblCommentCount = "0 <i class='fa fa-comment'></i> ";

        lblCommentCount = '<a href="javascript:" class="newsAddComment letter-blue" data-media-id="'+idMedia+'">' + lblCommentCount + '</a>';

        if(typeof media.scope.type != "undefined" && media.scope.type != "private")
        lblCommentCount =  lblCommentCount+
                           "<button class='text-dark btn btn-link no-padding margin-right-10 btn-share bold'"+
                              " style='margin-top:-3px;'" +
                              " data-id='"+idMediaShare+"' data-type='"+typeMediaShare+"'>"+
                              "<i class='fa fa-share'></i> Partager"+
                           "</button>";

        var countShare = media.sharedBy.length-1;
        if(countShare > 1)
        lblCommentCount =  lblCommentCount+
                           "<small class='pull-right tooltips' data-original-title='ce message a été partagé "+countShare+" fois'"+
                              " style='margin-top:3px;'>" +
                              "<i class='fa fa-share'></i> "+countShare+
                           "</small>";


        var voteTools = voteCheckAction(media._id['$id'], media);

        voteTools = lblCommentCount + voteTools;

        $("#footer-media-"+media._id['$id']).html(voteTools);

    }
  });

  initBtnShare();

  $(".newsAddComment").off().click(function(){
    var id = $(this).data("media-id");
    showCommentsTools(id);
  });
}


//lance le chargement des commentaires pour une publication
function showCommentsTools(id){ console.log("showCommentsTools", id);
    if(!$("#commentContent"+id).hasClass("hidden")){
      $(".commentContent").html("");
      $(".commentContent").removeClass("hidden");   
      $(".footer-comments").html("");
      $('#commentContent'+id).html('<div class="text-dark margin-bottom-10"><i class="fa fa-spin fa-refresh"></i> Chargement des commentaires ...</div>');
      getAjax('#commentContent'+id ,baseUrl+'/'+moduleId+"/comment/index/type/news/id/"+id,function(){ 
        
      },"html");
    }else{
      $("#commentContent"+id).removeClass("hidden");    
      
    }
}

function voteCheckAction(idVote, newsObj) {
  var voteUpCount = reportAbuseCount = voteDownCount = 0;
  textUp="text-dark";
  textDown="text-dark";
  textReportAbuse="text-dark";

  if ("undefined" != typeof newsObj.voteUp && "undefined" != typeof newsObj.voteUpCount && newsObj.voteUpCount > 0){ 
    voteUpCount = newsObj.voteUpCount;
    if ("undefined" != typeof newsObj.voteUp[idSession]){
      textUp= "text-green";
      $(".newsVoteDown[data-id="+idVote+"]").off();
    }
  }

  if ("undefined" != typeof newsObj.voteDown && "undefined" != typeof newsObj.voteDownCount && newsObj.voteDownCount > 0) {
    voteDownCount = newsObj.voteDownCount;
    if ("undefined" != typeof newsObj.voteDown[idSession]){
      textDown= "text-orange";
      $(".newsVoteUp[data-id="+idVote+"]").off();
    }
  }

  if ("undefined" != typeof newsObj.reportAbuse && "undefined" != typeof newsObj.reportAbuseCount && newsObj.reportAbuseCount > 0) {
    reportAbuseCount = newsObj.reportAbuseCount;
    if ("undefined" != typeof newsObj.reportAbuse[idSession]){
      textReportAbuse= "text-red";
      $(".newsReportAbuse[data-id="+idVote+"]").off();
    }
  }
  voteHtml = "<a href='javascript:;' class='newsVoteUp' onclick='newsVoteUp(this, \""+idVote+"\")' data-count='"+voteUpCount+"' data-id='"+idVote+"' data-type='"+newsObj.target.type+"'><span class='label "+textUp+"'>"+voteUpCount+" <i class='fa fa-thumbs-up'></i></span></a> "+
      "<a href='javascript:;' class='newsVoteDown' onclick='newsVoteDown(this, \""+idVote+"\")' data-count='"+voteDownCount+"' data-id='"+idVote+"' data-type='"+newsObj.target.type+"'><span class='label "+textDown+"'>"+voteDownCount+" <i class='fa fa-thumbs-down'></i></span></a>"+
      "<a href='javascript:;' class='newsReportAbuse' onclick='newsReportAbuse(this, \""+idVote+"\")' data-count='"+reportAbuseCount+"' data-id='"+idVote+"' data-type='"+newsObj.target.type+"'><span class='label "+textReportAbuse+"'>"+reportAbuseCount+" <i class='fa fa-flag'></i></span></a>";
  return voteHtml;
}



function bindEventTextArea(idTextArea, idComment, isAnswer, parentCommentId){

    var idUx = (parentCommentId == "") ? idComment : parentCommentId;
    
    $(idTextArea).css('height', "34px");
    $("#container-txtarea-"+idUx).css('height', "34px");
    autosize($(idTextArea));

    $(idTextArea).on('keyup ', function(e){
      if(e.which == 13 && !e.shiftKey && $(idTextArea).val() != "" && $(idTextArea).val() != " ") {
              //submit form via ajax, this is not JS but server side scripting so not showing here
              saveComment($(idTextArea).val(), parentCommentId);
              $(idTextArea).val("");
              $(idTextArea).css('height', "34px");
          }
          var heightTxtArea = $(idTextArea).css("height");
          $("#container-txtarea-"+idUx).css('height', heightTxtArea);
    });

    $(idTextArea).bind ("input propertychange", function(e){
      var heightTxtArea = $(idTextArea).css("height");
          $("#container-txtarea-"+idUx).css('height', heightTxtArea);
    });
  }



  function showMoreComments(id, hiddenCount){ mylog.log("showMoreComments", id, hiddenCount);
    $(".hidden-"+hiddenCount).removeClass("hidden");
    $(".link-show-more-" + (hiddenCount-10)).addClass("hidden");
  }

  function hideComments(id, level){ mylog.log("#comments-list-"+id + " .item-comment", level);
    //$("#comments-list-"+id + " .item-comment").addClass("hidden");
    if(level<=1){
      $("#commentContent"+id).addClass("hidden");
      //mylog.log("scroll TO : ", $('#newsFeed'+id).position().top, $('#newsHistory').position().top);
      $('.my-main-container').animate({
            scrollTop: $('#newsFeed'+id).position().top + $('#newsHistory').position().top
        }, 400);
    }
    else
      $("#comments-list-"+id).addClass("hidden");
  }



  //When a user already did an action on a comment the other buttons are disabled
  function disableOtherAction(commentId, action,method) {
    mylog.log("disableOtherAction", method);
    if(method){ //unset

      mylog.log("disableOtherAction 1", action);
      $(".commentVoteUp[data-id='"+commentId+"']").removeClass("text-green").data("voted", false);
      $(".commentVoteDown[data-id='"+commentId+"']").removeClass("text-orange").data("voted", false);
      $(".commentReportAbuse[data-id='"+commentId+"']").data("voted", false);

      var count = $(action+"[data-id='"+commentId+"']").data("countcomment");
      mylog.log("count 1", count);
      $(action+"[data-id='"+commentId+"']").data("countcomment", count-1);
      $(action+"[data-id='"+commentId+"'] .countC").html(count-1);
    }
    else{ //set
      mylog.log("disableOtherAction 2", method);
      $(".commentVoteUp[data-id='"+commentId+"']").removeClass("text-green").data("voted",true);
      $(".commentVoteDown[data-id='"+commentId+"']").removeClass("text-orange").data("voted",true);
      $(".commentReportAbuse[data-id='"+commentId+"']").data("voted",true);

      if (action == ".commentVoteUp") $(".commentVoteUp[data-id='"+commentId+"']").addClass("text-green");
      if (action == ".commentVoteDown") $(".commentVoteDown[data-id='"+commentId+"']").addClass("text-orange");
      if (action == ".commentReportAbuse") $(".commentReportAbuse[data-id='"+commentId+"']").addClass("text-red");

      var count = $(action+"[data-id='"+commentId+"']").data("countcomment");
      $(action+"[data-id='"+commentId+"']").data("countcomment", count+1);
      $(action+"[data-id='"+commentId+"'] .countC").html(count+1);
    }
  }



  function updateComment(id, newText){
    updateField("Comment",id,"text",newText,false);
    $('#item-comment-'+id+' .text-comment').html(newText);
    toastr.success("Votre commentaire a bien été modifié");
  }

  function linkify(inputText) {
      var replacedText, replacePattern1, replacePattern2, replacePattern3;

      //URLs starting with http://, https://, or ftp://
      replacePattern1 = /(\b(https?|ftp):\/\/[-A-Z0-9+&@#\/%?=~_|!:,.;]*[-A-Z0-9+&@#\/%=~_|])/gim;
      replacedText = inputText.replace(replacePattern1, '<a href="$1" target="_blank" class="text-azure">$1</a>');

      //URLs starting with "www." (without // before it, or it'd re-link the ones done above).
      replacePattern2 = /(^|[^\/])(www\.[\S]+(\b|$))/gim;
      replacedText = replacedText.replace(replacePattern2, '$1<a href="http://$2" target="_blank" class="text-azure">$2</a>');

      //Change email addresses to mailto:: links.
      //replacePattern3 = /(([a-zA-Z0-9\-\_\.])+@[a-zA-Z\_]+?(\.[a-zA-Z]{2,6})+)/gim;
      //replacedText = replacedText.replace(replacePattern3, '<a href="mailto:$1">$1</a>');

      return replacedText;
  }



  function answerComment(idComment, parentCommentId){ 
    mylog.log("answerComment", parentCommentId, $("#comments-list-"+parentCommentId).hasClass("hidden"));
    
    if($("#argval").length > 0){
      $(".textarea-new-comment").removeClass("bg-green-comment bg-red-comment");
      $(".textarea-new-comment").addClass("bg-white-comment").attr("placeholder", "Votre commentaire");
      $("#argval").val("");
    }
    
    if(!$("#comments-list-"+parentCommentId).hasClass("hidden"))
      $("#comments-list-"+parentCommentId).addClass("hidden");
    else
      $("#comments-list-"+parentCommentId).removeClass("hidden");
    
    //si l'input existe déjà on sort
    if($('#container-txtarea-'+parentCommentId).length > 0) return;

    var html = '<div id="container-txtarea-'+parentCommentId+'" class="">' +

            '<img src="'+profilThumbImageUrlUser+'" class="img-responsive pull-left" '+
            '  style="margin-right:10px;height:32px; border-radius:3px;">'+
          
            '<div class="ctnr-txtarea">';

    html +=   '<textarea rows="1" style="height:1em;" class="form-control textarea-new-comment" ' +
                      'id="textarea-new-comment'+parentCommentId+'" placeholder="Votre réponse..."></textarea>' +
            
            '</div>' +
          '</div>';

    $("#comments-list-"+parentCommentId).prepend(html);

    bindEventTextArea('#textarea-new-comment'+parentCommentId, idComment, true, parentCommentId);
  }
