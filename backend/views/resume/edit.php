<?php include '../views/viewtop.php';?>
<style>
	.form-control { width: 150px; }
	td{ height:50px;}
	.requ{ color:#FF0000;}
	.biaoqian{background-color:#B8CDD3; height:30px; line-height:30px; font-size:14px; font-weight:bold; color:#FFFFFF;}
	body{ height:1200px;}
</style>
<div id="page-inner">
  <div class="row">
    <div class="col-md-12">
      <h1 class="page-header"> 编辑简历 </h1>
    </div>
  </div>
  <!-- /. ROW  -->
  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-heading"> <a href="#" onclick="javascript:history.go(-1)" class="btn btn-info btn-sm">返回</a> </div>
        <div class="panel-body" >
          <form action="/resume/edit">
              <input type="hidden" name="id" value="<?=$info['id']?>">
            <table width="100%" border="0">
              <tr>
                <td colspan="6"><div class="biaoqian">基本信息</div></td>
              </tr>
              <tr>
                <td width="10%"><span class="requ">*</span>姓&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;名：</td>
                <td width="10%" ><input class="form-control" ck="required"  name="userName" value="<?=$info['userName']?>" placeholder="姓名" /></td>
                <td width="10%" align="center"><span class="requ">*</span>性&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;别：</td>
                <td width="14%"><input type="radio" name="sex" id="sex1"  value="1" checked="" />
                  男
                    <input type="radio" name="sex" id="sex2"  value="2" />
                  女 </td>
                <td width="7%">年&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;龄：</td>
                <td width="53%"><input class="form-control"  name="age" value="<?=$info['age']?>" placeholder="年龄"  /></td>
              </tr>
              <tr>
                <td><span class="requ">*</span>手&nbsp;机&nbsp;号：</td>
                <td><?=$info['phone']?></td>
                <td align="center">是&nbsp;否&nbsp;密&nbsp;号：</td>
                <td><input type="radio" name="isMiHao" id="isMiHao1"  value="1" />
                  是
                  <input type="radio" name="isMiHao" id="isMiHao0"  value="0" />
                  不是 </td>
                <td>最高学历：</td>
                <td><select name="xueLi" id="xueli" class="form-control">
                    <option value="初中">初中</option>
                    <option value="技校">技校</option>
                    <option value="高中">高中</option>
                    <option value="中专">中专</option>
                    <option value="大专">大专</option>
                    <option value="本科">本科</option>
                    <option value="研究生">研究生</option>
                    <option value="硕士">硕士</option>
                    <option value="博士">博士</option>
                  </select>                </td>
              </tr>
              <tr>
                <td>出生年月：</td>
                <td><input class="form-control demo-input"  name="chuShengRiQi" id="chuShengRiQi" value="<?=$info['chuShengRiQi']?>" placeholder="出生年月" /></td>
                <td align="center">身份证号码：</td>
                <td><input name="shenFenZheng" value="<?=$info['shenFenZheng']?>" class="form-control"  placeholder="身份证号码" style="width:200px;" maxlength="18" /></td>
                <td>期望薪资：</td>
                <td><select class="form-control" name="qiWangXinZi" id="qiWangXinZi">
                   <option value="1000~3000">1000~3000</option>
                    <option value="3000~5000">3000~5000</option>
                    <option value="5000~7000">5000~7000</option>
                    <option value="7000以上">7000以上</option>
                </select></td>
              </tr>
              <tr>
                <td>岗位类别：</td>
                <td><select class="form-control" name="rcName1" id="rcName1">
                    <option value="0">------请选择------</option>
                    <?php  if (!empty($cate)){foreach ($cate as $v){?>
                    <option value="<?=$v['id'];?>,<?=$v['cName'];?>">
                    <?=$v['cName'];?>
                    </option>
                    <?php }} ?>
                  </select>                </td>
                <td colspan="4"><select class="form-control" name="rcName2" id="rcName2"  style="margin-left:30px;">
                    <option value="0">------请选择------</option>
                </select></td>
              </tr>
              <tr>
                <td>户籍地址：</td>
                <td colspan="5"><input class="form-control"  name="huJiDiZhi"  value="<?=$info['huJiDiZhi']?>" placeholder="户籍地址" style="width:400px;"  /></td>
              </tr>
              <tr>
                <td>居住地址：</td>
                <td colspan="5"><input class="form-control"  name="juZhuDiZhi" value="<?=$info['juZhuDiZhi']?>" placeholder="居住地址" style="width:400px;" /></td>
              </tr>
              <tr>
                <td colspan="6"><div class="biaoqian">附加信息</div></td>
              </tr>
              <tr>
                <td>政治面貌：</td>
                <td><input class="form-control"  name="mianMao" value="<?=$info['mianMao']?>" placeholder="政治面貌" /></td>
                <td align="center">民&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;族：</td>
                <td><input class="form-control"  name="minZu" value="<?=$info['minZu']?>" placeholder="民族" /></td>
                <td>婚姻状况&nbsp;：</td>
                <td><select class="form-control" name="hunYin" id="hunYin">
                    <option value="0">未婚</option>
                    <option value="1">已婚</option>
                    <option value="2">丧偶</option>
                  </select>                </td>
              </tr>
              <tr>
                <td>微&nbsp;信&nbsp;&nbsp;ID：</td>
                <td><input class="form-control"  name="weiXin" value="<?=$info['weiXin']?>" placeholder="微信" /></td>
                <td align="center">邮&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;箱：</td>
                <td><input class="form-control"  name="emails" value="<?=$info['email']?>" placeholder="邮箱" /></td>
                <td>QQ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;：</td>
                <td><input class="form-control"  name="qq" maxlength="11" value="<?=$info['qq']?>" placeholder="qq" />                </td>
              </tr>
              <tr>
                <td>专&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;业：</td>
                <td><input class="form-control"  name="zhuanYe" value="<?=$info['zhuanYe']?>" placeholder="专业" /></td>
                <td align="center">紧急联系人：</td>
                <td><input class="form-control"  name="lianXiRen" value="<?=$info['lianXiRen']?>"  placeholder="紧急联系人" /></td>
                <td>紧急电话：</td>
                <td><input class="form-control"  name="lianXiRenPhone" value="<?=$info['lianXiRenPhone']?>" placeholder="联系人电话" /></td>
              </tr>
			   <tr>
                <td>备&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;注：</td>
                <td colspan="5"><input class="form-control" style="width:400px;" value="<?=$info['beizhu']?>" name="beizhu" placeholder="备注" /></td>
              </tr>
              <tr>
                <td colspan="6"><div class="biaoqian">银行信息</div></td>
              </tr>
			   <tr>
                <td>银&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;行：</td>
                <td><select class="form-control" name="yinHang" id="yinHang">
                    <option value="中国银行">中国银行</option>
                    <option value="交通银行">交通银行</option>
                    <option value="中国农业银行">中国农业银行</option>
                    <option value="招商银行">招商银行</option>
                    <option value="邮政储蓄银行">邮政储蓄银行</option>
                    <option value="光大银行">光大银行</option>
                    <option value="民生银行">民生银行</option>
                    <option value="平安银行">平安银行</option>
                    <option value="浦发银行">浦发银行</option>
                    <option value="中信银行">中信银行</option>
                    <option value="兴业银行">兴业银行</option>
                    <option value="华夏银行">华夏银行</option>
                    <option value="北京银行">北京银行</option>
                    <option value="徽商银行">徽商银行</option>
                    <option value="天津银行">天津银行</option>
                    <option value="深圳农村商业银行">深圳农村商业银行</option>
                    <option value="上海银行">上海银行</option>
                    <option value="汉口银行">汉口银行</option>
                    <option value="南京银行">南京银行</option>
                    <option value="宁波银行">宁波银行</option>
                    <option value="龙江银行">龙江银行</option>
                    <option value="北京农商银行">北京农商银行</option>
                    <option value="江苏银行">江苏银行</option>
                    <option value="广州银行">广州银行</option>
                    <option value="重庆银行">重庆银行</option>
                    <option value="浙商银行">浙商银行</option>
                    <option value="杭州银行">杭州银行</option>
                    <option value="上海农商银行">上海农商银行</option>
                    <option value="渤海银行">渤海银行</option>
                    <option value="重庆农村商业银行">重庆农村商业银行</option>
                    <option value="广州农村商业银行">广州农村商业银行</option>
                    <option value="青岛银行">青岛银行</option>
                    <option value="成都银行">成都银行</option>
                    <option value="哈尔滨银行">哈尔滨银行</option>
                    <option value="吉林银行">吉林银行</option>
                    <option value="大连银行">大连银行</option>
                    <option value="齐鲁银行">齐鲁银行</option>
                    <option value="东莞银行">东莞银行</option>
                    <option value="长沙银行">长沙银行</option>
                    <option value="河北银行">河北银行</option>
                    <option value="东莞农村商业银行">东莞农村商业银行</option>
                    <option value="郑州银行">郑州银行</option>
                </select></td>
                <td align="center">银&nbsp;行&nbsp;卡&nbsp;号：</td>
                <td><input class="form-control"  name="yinHangNum" value="<?=$info['yinHangNum']?>" placeholder="银行卡号" /></td>
                <td>开户网点： </td>
                <td><input class="form-control"  name="kaiHuWangDian" value="<?=$info['kaiHuWangDian']?>" placeholder="开户网点" /></td>
              </tr>
              <tr>
                <td colspan="6"><div class="biaoqian">工作经历</div></td>
              </tr>
              <tr>
                <td >起止时间：</td>
                <td><input class="form-control demo-input"  name="shijian1" id="shijian1" placeholder="起止时间" />                </td>
                <td align="center" >企业名称：</td>
                <td><input class="form-control"  name="qiye1" id="qiye1" placeholder="企业名称" /></td>
                <td>工作岗位：</td>
                <td><input class="form-control"  name="gangwei1" id="gangwei1" placeholder="工作岗位" /></td>
              </tr>
              <tr>
                <td >起止时间：</td>
                <td><input class="form-control demo-input"  name="shijian2" id='shijian2' placeholder="起止时间" /></td>
                <td align="center" >企业名称：</td>
                <td><input class="form-control"  name="qiye2" id='qiye2' placeholder="企业名称" /></td>
                <td>工作岗位：</td>
                <td><input class="form-control"  name="gangwei2" id='gangwei2' placeholder="工作岗位" /></td>
              </tr>
              <tr>
                <td >起止时间：</td>
                <td><input class="form-control demo-input"  name="shijian3" id='shijian3' placeholder="起止时间" />                </td>
                <td align="center" >企业名称：</td>
                <td><input class="form-control"  name="qiye3" id='qiye3' placeholder="企业名称" /></td>
                <td>工作岗位：</td>
                <td><input class="form-control"  name="gangwei3" id='gangwei3' placeholder="工作岗位" /></td>
              </tr>
            </table>
            <button type="button" id="submit"   class="btn btn-danger btn-sm">确定</button>
          </form>
          <!-- /.row (nested) -->
        </div>
        <!-- /.panel-body -->
      </div>
      <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
  </div>
</div>
<!-- 模态框（Modal） -->
<div class="modal fade"  id="myModal" tabindex="-1" style="top:50%" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body"> </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">确定 </button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal -->
</div>
<script type="text/javascript">

	var gongzuo = '<?= $info['gongZuoJingLi'];?>';
	if (gongzuo != '') {
        var dataObj=eval("("+gongzuo+")");//转换为json对象

        for (x in dataObj)
        {
            $('#shijian'+x).val(dataObj[x]['shijian'+x]);
            $('#qiye'+x).val(dataObj[x]['qiye'+x]);
            $('#gangwei'+x).val(dataObj[x]['gangwei'+x]);

        }
    }


	var sex = '<?= $info['sex'];?>';
	$("#sex"+sex).attr('checked','checked');

	var isMiHao = '<?=$info['isMiHao']?>';
    $("#isMiHao"+isMiHao).attr('checked','checked');

    var xueLi = '<?=$info['xueLi']?>';
    $("#xueli option[value='"+xueLi+"']").attr("selected",true);

    var hunYin = '<?=$info['hunYin']?>';
    $("#hunYin option[value='"+hunYin+"']").attr("selected",true);

    var yinHang = '<?=$info['yinHang']?>';
    $("#yinHang option[value='"+yinHang+"']").attr("selected",true);

    var qiWangXinZi = '<?=$info['qiWangXinZi']?>';
    $("#qiWangXinZi option[value='"+qiWangXinZi+"']").attr("selected",true);

    var rcName1 = '<?=$info['rcId1'].','.$info['rcName1']?>';
    $("#rcName1 option[value='"+rcName1+"']").attr("selected",true);
    rcChange(rcName1,true);


    $('#rcName1').change(function () {
        var id = $(this).val();
        rcChange(id);
    })
    
    function rcChange(id,falg=false) {
        id = id.split(',');
        if (id[0] > 0) {
            $.post('/resume-category/ajax-category',{'id':id[0]},function (data) {
                $('#rcName2').html('');
                var strHtml = "";
                var count = data.length;
                var val = null;
                for(var i = 0 ; i < count ; i++) {
                    val = data[i]['id']+','+data[i]['cName'];
                    strHtml += "<option value='"+val+"'>"+data[i]['cName']+"</option>";
                }
                $('#rcName2').html(strHtml);
                if (falg) {
                    var rcName2 = '<?=$info['rcId2'].','.$info['rcName2']?>';
                    $("#rcName2 option[value='"+rcName2+"']").attr("selected",true);
                }
            },'json')
        } else  {
            var strHtml = "<option value='0'>------请选择------</option>";
            $('#rcName2').html(strHtml);
        }
    }
	
	
	 //常规用法
    laydate.render({
      elem: '#chuShengRiQi' //指定元素
    });
	
	 //年月范围
    laydate.render({
      elem: '#shijian1'
      ,type: 'month'
      ,range: true
    });
	 laydate.render({
      elem: '#shijian2'
      ,type: 'month'
      ,range: true
    });
	 laydate.render({
      elem: '#shijian3'
      ,type: 'month'
      ,range: true
    });
</script>
