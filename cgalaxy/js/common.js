

var now = new Date().getTime();
var domainUrl="http://localhost/cgalaxy/"//"http://bxu2442650602.my3w.com/";
function ajaxPost(_url,_method, _para,_isWhen){
      if(_para==null)_para= $(":input").serializeArray();
      // _para.vhstoken=vhsToken;
      $.ajax({
          type:"post",
          url:_url,
          data:_para,
          success:function (data,status,_accName){
             if(data!=null&&data!=null){
                if(data['info']=='sqlEx'){
                     alert("数据库操作出错");
                 }else if(data['info']=='fileEx'){
                    alert("文件读取出错");
                }else if(data['info']=='otherEx'){
                    alert("其他不明错误");
                }else{
                    _method.call(this,data);
                }
                if(_isWhen)ajaxWhen.endMethod(_accName);
             }else{
                 _method.call(this,data);
                 if(_isWhen)ajaxWhen.endMethod(_accName);
             }
          },
          error:ajaxError,
          timeout:10000,
          //dataType:"json"
      });
}

function ajaxError(){
}



//闭包存只读值
  function readOnly(value){

    var read=function(){
      return value;
    };
    return read;
  }