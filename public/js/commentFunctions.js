function editComment(id){
    var commentBox = $("#editComment");
    var oldComment = $("#"+id);
    var commentForm = $("#editCommentForm");
    commentBox.html(oldComment.html());
    commentForm.attr('action', 'http://blog.test/comment/'+id);
    console.log(commentForm.attr('action'));
}

function deleteComment(id){
    var commentId = $("#commentId");
    var deleteCommentForm = $("#deleteCommentForm");
    commentId.val(id);
    deleteCommentForm.attr('action', 'http://blog.test/comment/'+id);
    console.log(deleteCommentForm.attr('action'));
}