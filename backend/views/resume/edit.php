<?php include '../views/viewtop.php';?>
<div class="page-content">
    <!-- BEGIN PAGE CONTAINER-->
    <div class="container-fluid">
        <!-- BEGIN PAGE HEADER-->
        <div class="row-fluid">
            <div class="span12">
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">编辑简历</h3>
                <ul class="breadcrumb">
                    <li> <i class="icon-home"></i>首页 <i class="icon-angle-right"></i> </li>
                    <li> 简历管理<i class="icon-angle-right"></i> </li>
                    <li>简历列表<i class="icon-angle-right"></i></li>
                    <li>编辑简历</li>
                </ul>
                <!-- END PAGE TITLE & BREADCRUMB-->
            </div>
        </div>
        <!-- END PAGE HEADER-->
        <!-- BEGIN PAGE CONTENT-->
        <div class="row-fluid">
            <div class="span12">
                <div class="alert alert-success"> <a href="#" onclick="javascript:history.go(-1)" >返回</a> </div>
                <!-- BEGIN SAMPLE TABLE PORTLET-->
                <div class="portlet box blue">
                    <div class="portlet-title">
                        <div class="caption"><i class="icon-cogs"></i>新增</div>
                    </div>
                    <div class="portlet-body form">
                        <form action="/resume/edit" class="horizontal-form">
                            <input type="hidden" name="id" value="<?=$info['id']?>">
                            <h1 class="form-section">基本信息</h1>
                            <div class="row-fluid">
                                <div class="span6">
                                    <div class="control-group">
                                        <label class="control-label" for="firstName">姓 名<span class="required">*</span></label>
                                        <div class="controls">
                                            <input class="m-wrap span12" ck="required" id="userName" name="userName" value="<?=$info['userName']?>" placeholder="姓名" maxlength="30" />
                                        </div>
                                    </div>
                                </div>
                                <div class="span6">
                                    <div class="control-group">
                                        <label class="control-label" for="firstName">性 别<span class="required">*</span></label>
                                        <div class="controls">
                                            <label class="radio">
                                                <div class="radio"><span><input type="radio" id="sex1" name="sex" value="1" checked></span></div>男
                                            </label>
                                            <label class="radio">
                                                <div class="radio"><span><input type="radio" id="sex2" name="sex" value="2"></span></div>女
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row-fluid">
                                <div class="span6">
                                    <div class="control-group">
                                        <label class="control-label" for="firstName">年 龄</label>
                                        <div class="controls">
                                            <input class="m-wrap span12" id="age" name="age" value="<?=$info['age']?>"  placeholder="年龄" maxlength="3"  />
                                        </div>
                                    </div>
                                </div>
                                <div class="span6">
                                    <div class="control-group">
                                        <label class="control-label" for="firstName">手 机 号<span class="required">*</span></label>
                                        <div class="controls">
                                            <input class="m-wrap span12" ck="required" id="phone" name="phone" value="<?=$info['phone']?>" placeholder="手机号" maxlength="11"  />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row-fluid">
                                <div class="span6">
                                    <div class="control-group">
                                        <label class="control-label">最 高 学 历</label>
                                        <div class="controls">
                                            <select class="m-wrap span12" name="xueLi" id="xueLi">
                                                <option value="初中">初中</option>
                                                <option value="技校">技校</option>
                                                <option value="高中">高中</option>
                                                <option value="中专">中专</option>
                                                <option value="大专">大专</option>
                                                <option value="本科">本科</option>
                                                <option value="研究生">研究生</option>
                                                <option value="硕士">硕士</option>
                                                <option value="博士">博士</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="span6">
                                    <div class="control-group">
                                        <label class="control-label" for="firstName">是 否 密 号</label>
                                        <div class="controls">
                                            <label class="radio">
                                                <div class="radio"><span><input type="radio" id="isMiHao1" name="isMiHao" value="1" ></span></div>是
                                            </label>
                                            <label class="radio">
                                                <div class="radio"><span><input type="radio" id="isMiHao0" name="isMiHao" value="0" checked></span></div>不是
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row-fluid">
                                <div class="span6">
                                    <div class="control-group">
                                        <label class="control-label" for="firstName">出 生 年 月</label>
                                        <div class="controls">
                                            <input class="m-wrap span12" name="chuShengRiQi" id="chuShengRiQi" value="<?=$info['chuShengRiQi']?>" placeholder="出生年月"  />
                                        </div>
                                    </div>
                                </div>
                                <div class="span6">
                                    <div class="control-group">
                                        <label class="control-label" for="firstName">身 份 证 号 码</label>
                                        <div class="controls">
                                            <input class="m-wrap span12" id="shenFenZheng" name="shenFenZheng" value="<?=$info['shenFenZheng']?>" placeholder="身份证号码"  maxlength="18"   />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row-fluid">
                                <div class="span6">
                                    <div class="control-group">
                                        <label class="control-label">期 望 薪 资</label>
                                        <div class="controls">
                                            <select class="m-wrap span12" id="qiWangXinZi" name="qiWangXinZi">
                                                <option value="1000~3000">1000~3000</option>
                                                <option value="3000~5000">3000~5000</option>
                                                <option value="5000~7000">5000~7000</option>
                                                <option value="7000以上">7000以上</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="span6">
                                    <div class="control-group">
                                        <label class="control-label" for="firstName">户 籍 地 址</label>
                                        <div class="controls">
                                            <input class="m-wrap span12" id="huJiDiZhi" name="huJiDiZhi" value="<?=$info['huJiDiZhi']?>" placeholder="户籍地址" maxlength="100"  />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row-fluid">
                                <div class="span6">
                                    <div class="control-group">
                                        <label class="control-label">岗 位 类 别</label>
                                        <div class="controls">
                                            <select class="m-wrap span12" name="rcName1" id="rcName1">
                                                <option value="0">请选择</option>
                                                <?php  if (!empty($cate)){foreach ($cate as $v){?>
                                                    <option value="<?=$v['id'];?>,<?=$v['cName'];?>"><?=$v['cName'];?></option>
                                                <?php }} ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="span6">
                                    <div class="control-group">
                                        <label class="control-label">&nbsp;</label>
                                        <div class="controls">
                                            <select class="m-wrap span12" name="rcName2" id="rcName2">
                                                <option value="0">请选择</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row-fluid">
                                <div class="span6">
                                    <div class="control-group">
                                        <label class="control-label" for="firstName">居 住 地 址</label>
                                        <div class="controls">
                                            <input class="m-wrap span12" name="juZhuDiZhi" value="<?=$info['juZhuDiZhi']?>" placeholder="居住地址" maxlength="100" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h1 class="form-section">附加信息</h1>
                            <div class="row-fluid">
                                <div class="span6">
                                    <div class="control-group">
                                        <label class="control-label" for="firstName">政 治 面 貌</label>
                                        <div class="controls">
                                            <input class="m-wrap span12" id="mianMao" name="mianMao" value="<?=$info['mianMao']?>" placeholder="政治面貌" maxlength="20" />
                                        </div>
                                    </div>
                                </div>
                                <div class="span6">
                                    <div class="control-group">
                                        <label class="control-label" for="firstName">民 族</label>
                                        <div class="controls">
                                            <input class="m-wrap span12" id="minZu" name="minZu" value="<?=$info['minZu']?>" placeholder="民族" maxlength="10" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row-fluid">
                                <div class="span6">
                                    <div class="control-group">
                                        <label class="control-label">婚 姻 状 况</label>
                                        <div class="controls">
                                            <select class="m-wrap span12" name="hunYin">
                                                <option value="0">未婚</option>
                                                <option value="1">已婚</option>
                                                <option value="2">丧偶</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="span6">
                                    <div class="control-group">
                                        <label class="control-label" for="firstName">微 信 ID</label>
                                        <div class="controls">
                                            <input class="m-wrap span12" id="weiXin" name="weiXin" value="<?=$info['weiXin']?>" placeholder="微信" maxlength="30"  />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row-fluid">
                                <div class="span6">
                                    <div class="control-group">
                                        <label class="control-label" for="firstName">邮 箱</label>
                                        <div class="controls">
                                            <input class="m-wrap span12" id="emails" name="emails" value="<?=$info['email']?>" placeholder="邮箱"  />
                                        </div>
                                    </div>
                                </div>
                                <div class="span6">
                                    <div class="control-group">
                                        <label class="control-label" for="firstName">QQ</label>
                                        <div class="controls">
                                            <input class="m-wrap span12" id="qq" name="qq" placeholder="qq" value="<?=$info['qq']?>"  maxlength="11" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row-fluid">
                                <div class="span6">
                                    <div class="control-group">
                                        <label class="control-label" for="firstName">紧 急 联 系 人</label>
                                        <div class="controls">
                                            <input class="m-wrap span12" name="lianXiRen" value="<?=$info['lianXiRen']?>" placeholder="紧急联系人" maxlength="30" />
                                        </div>
                                    </div>
                                </div>
                                <div class="span6">
                                    <div class="control-group">
                                        <label class="control-label" for="firstName">紧 急 电 话</label>
                                        <div class="controls">
                                            <input class="m-wrap span12" name="lianXiRenPhone" value="<?=$info['lianXiRenPhone']?>" placeholder="联系人电话"  maxlength="11" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row-fluid">
                                <div class="span6">
                                    <div class="control-group">
                                        <label class="control-label" for="firstName">专 业</label>
                                        <div class="controls">
                                            <input class="m-wrap span12" name="zhuanYe" value="<?=$info['zhuanYe']?>"  placeholder="专业" maxlength="20" />
                                        </div>
                                    </div>
                                </div>
                                <div class="span6">
                                    <div class="control-group">
                                        <label class="control-label" for="firstName">备 注</label>
                                        <div class="controls">
                                            <input class="m-wrap span12" name="beizhu" value="<?=$info['beizhu']?>" placeholder="备注" maxlength="50"  />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <h1 class="form-section">银行信息</h1>
                            <div class="row-fluid">
                                <div class="span6">
                                    <div class="control-group">
                                        <label class="control-label">银 行</label>
                                        <div class="controls">
                                            <select class="m-wrap span12" id="yinHang" name="yinHang">
                                                <option value="">请选择</option>
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
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="span6">
                                    <div class="control-group">
                                        <label class="control-label" for="firstName">银 行 卡 号</label>
                                        <div class="controls">
                                            <input class="m-wrap span12" name="yinHangNum" value="<?=$info['yinHangNum']?>" placeholder="银行卡号" maxlength="20" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row-fluid">
                                <div class="span6">
                                    <div class="control-group">
                                        <label class="control-label" for="firstName">开 户 网 点</label>
                                        <div class="controls">
                                            <input class="m-wrap span12" name="kaiHuWangDian" value="<?=$info['kaiHuWangDian']?>" placeholder="开户网点" maxlength="50" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <h1 class="form-section">工作经历</h1>
                            <div class="row-fluid">
                                <div class="span4">
                                    <div class="control-group">
                                        <label class="control-label" for="firstName">起 止 时 间</label>
                                        <div class="controls">
                                            <input class="m-wrap span12" id="shijian1"   name="shijian1" placeholder="起止时间"  />
                                        </div>
                                    </div>
                                </div>
                                <div class="span4">
                                    <div class="control-group">
                                        <label class="control-label" for="firstName">企 业 名 称</label>
                                        <div class="controls">
                                            <input class="m-wrap span12" id="qiye1"  name="qiye1" placeholder="企业名称"  />
                                        </div>
                                    </div>
                                </div>
                                <div class="span4">
                                    <div class="control-group">
                                        <label class="control-label" for="firstName">工 作 岗 位</label>
                                        <div class="controls">
                                            <input class="m-wrap span12" id="gangwei1"  name="gangwei1" placeholder="工作岗位" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row-fluid">
                                <div class="span4">
                                    <div class="control-group">
                                        <label class="control-label" for="firstName">起 止 时 间</label>
                                        <div class="controls">
                                            <input class="m-wrap span12" id="shijian2"   name="shijian2" placeholder="起止时间"  />
                                        </div>
                                    </div>
                                </div>
                                <div class="span4">
                                    <div class="control-group">
                                        <label class="control-label" for="firstName">企 业 名 称</label>
                                        <div class="controls">
                                            <input class="m-wrap span12" id="qiye2"  name="qiye2" placeholder="企业名称"  />
                                        </div>
                                    </div>
                                </div>
                                <div class="span4">
                                    <div class="control-group">
                                        <label class="control-label" for="firstName">工 作 岗 位</label>
                                        <div class="controls">
                                            <input class="m-wrap span12" id="gangwei2" name="gangwei2" placeholder="工作岗位" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row-fluid">
                                <div class="span4">
                                    <div class="control-group">
                                        <label class="control-label" for="firstName">起 止 时 间</label>
                                        <div class="controls">
                                            <input class="m-wrap span12" id="shijian3"   name="shijian3" placeholder="起止时间"  />
                                        </div>
                                    </div>
                                </div>
                                <div class="span4">
                                    <div class="control-group">
                                        <label class="control-label" for="firstName">企 业 名 称</label>
                                        <div class="controls">
                                            <input class="m-wrap span12" id="qiye3" name="qiye3" placeholder="企业名称"  />
                                        </div>
                                    </div>
                                </div>
                                <div class="span4">
                                    <div class="control-group">
                                        <label class="control-label" for="firstName">工 作 岗 位</label>
                                        <div class="controls">
                                            <input class="m-wrap span12" id="gangwei3" name="gangwei3" placeholder="工作岗位" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <button type="button" id="submit" class="btn blue">确定</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- END PAGE CONTENT-->
        </div>
        <!-- END PAGE CONTAINER-->
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
