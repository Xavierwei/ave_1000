<div class="make">
	<div class="activity_step"><img src="<?=Yii::app()->baseUrl?>/images/step3.png" /></div>
    <div class="make_tit"></div>
    <div class="make_txt">您的孩子信息已被记录，继续制作电子档案，完善个人信息。</div>
    <div class="make_item">
        <div class="make_itemtit">STEP1 上传儿童照片</div>
        <div class="make_com cs-clear">
            <div class="make_pho" id="avatar_wrap">
                <img src="<?=Yii::app()->baseUrl . ($model->avatar ? $model->avatar : '/images/make_up.jpg')?>" />
                <div class="make_phobg"><input id="avatar" name="avatar" type="file" ></div>
                <div class="make_phoclose"></div>
            </div>
            <div class="make_formate">
                <p>上传照片格式：(jpg, png, bmp)</p>
                <p>建议尺寸: 800x600像素</p>
                <p>图片大小控制在1MB以内</p>
            </div>
        </div>
<!--        <div class="make_btn"></div>-->
    </div>
    <div class="make_item">
        <div class="make_itemtit">STEP2 上传患处照片</div>
        <div class="make_com cs-clear">
            <div class="make_pho" id="photo1_wrap">
                <img src="<?=Yii::app()->baseUrl . ($model->photo1 ? $model->photo1 : '/images/make_up.jpg')?>" />
                <div class="make_phobg"><input id="photo1" name="photo1" type="file" ></div>
                <div class="make_phoclose"></div>
            </div>
            <div class="make_pho" id="photo2_wrap">
                <img src="<?=Yii::app()->baseUrl . ($model->photo2 ? $model->photo2 : '/images/make_up.jpg')?>" />
                <div class="make_phobg"><input  id="photo2" name="photo2" type="file" ></div>
                <div class="make_phoclose"></div>
            </div>
            <div class="make_pho" id="photo3_wrap">
                <img src="<?=Yii::app()->baseUrl . ($model->photo3 ? $model->photo3 : '/images/make_up.jpg')?>" />
                <div class="make_phobg"><input  id="photo3" name="photo3" type="file" ></div>
                <div class="make_phoclose"></div>
            </div>
        </div>
<!--        <div class="make_btn"></div>-->
    </div>
    <div class="make_item">
        <div class="make_itemtit">STEP3 上传真实病例扫描页</div>
        <div class="make_com cs-clear">
            <div class="make_pho" id="case_wrap">
                <img src="<?=Yii::app()->baseUrl . ($model->case ? $model->case : '/images/make_up2.jpg')?>" />
                <div class="make_phobg"><input  id="case" name="case" type="file" ></div>
                <div class="make_phoclose"></div>
            </div>
            <div class="make_formate">
                <p>上传照片格式：(jpg, png, bmp)</p>
                <p>建议尺寸: 800x600像素</p>
                <p>图片大小控制在1MB以内</p>
            </div>
        </div>
<!--        <div class="make_btn"></div>-->
    </div>
    <!--  -->
    <div class="make_ft">
        <div class="cs-clear"><p class="make_check">我已阅读“<a href="javascript:;" class="popshow_legal">隐私条款</a>”</p></div>
        <p>我同意雅漾使用孩子的个人档案，孩子患处信息不会对外公开。</p>
    </div>
    <div class="make_next cs-clear">
        <?php $form=$this->beginWidget('CActiveForm', array(
            'id'=>'record-update-form',
            'enableAjaxValidation'=>false,
        )); ?>
        <?php echo $form->textField($model,'avatar',array('hidden'=>'hidden')); ?>
        <?php echo $form->textField($model,'photo1',array('hidden'=>'hidden')); ?>
        <?php echo $form->textField($model,'photo2',array('hidden'=>'hidden')); ?>
        <?php echo $form->textField($model,'photo3',array('hidden'=>'hidden')); ?>
        <?php echo $form->textField($model,'case',array('hidden'=>'hidden')); ?>
        <?php $this->endWidget(); ?>
        <a class="nextForm btn" href="javascript:void(0)"></a>
    </div>
</div>
<div class="pop home_pop" id="pop_legal">
    <div class="popclose"></div>
    <div class="home_popcom">
        <h2>隐私条款</h2>
        <div class="rule_wrap">
            <p><strong>申请时间</strong><strong> </strong><br />
                2014年7月1日-2014年8月31日<strong></strong></p>
            <p><strong>申请方式 </strong><strong> </strong><br />
                在线申请：在本活动官方网站利用邮箱或微博注册，登陆后请按照提示完成宝宝资料填写，制作宝宝电子档案，进入1000Families候选名单。</p>
            <p><strong>申领名额及产品</strong><strong> </strong><br />
                雅漾将在所有申请者中随机抽取1000个湿疹儿童家庭，免费赠送湿疹特效护理套装（内含6支三重修护滋润霜200ml，6瓶舒护活泉喷雾150ml，及湿疹护理教育视频、湿疹护理手册）。自2014年7月15日起，被选中的儿童名单将每两周在活动官网上陆续公布，请密切关注官网信息，届时雅漾也将及时与您取得联系。</p>
            <p><strong>法律声明</strong><strong> </strong></p>
            <p>本网站的雅漾&ldquo;1000 Families  湿疹儿童优享乐生活&rdquo;关爱行动（&ldquo;本次活动&rdquo;）适用雅漾中国网站<a href="http://www.eau-thermale-avene.cn/"><strong>http://www.eau-thermale-avene.cn/</strong></a>的法律声明和如下本次活动的法律声明。本网站用户和活动参与者应当认真阅读雅漾中国网站的法律声明和本次活动的法律声明。网站用户和活动参与者不同意雅漾中国网站的法律声明和本次活动的法律声明的，应当立即停止使用网站和在网站上注册。使用和在本网站上注册的行为视为同意雅漾中国网站的法律声明和本次活动的法律声明，以及同意遵守该等法律声明，并且受该等法律声明的约束。 <br />
                如下本次活动的法律声明是雅漾中国网站法律声明的组成部分。若有冲突的，以如下法律声明为准。 <br />
                为本活动的目的，雅漾中国网站的法律声明和本次活动的法律声明以下合称为&ldquo;法律声明&rdquo;。<strong> </strong></p>
            <ul>
                <li>网站使用者在网站上注册账户时，会被要求填写如下真实的个人基本信息：姓名、身份证信息、地址、电话、电子邮箱、手机号码等真实的个人信息（&ldquo;<strong>个人信息</strong>&rdquo;），和用户基本信息：用户名称、用户密码、用户头像等用户信息（&ldquo;<strong>用户信息</strong>&rdquo;）。网站使用者在成功注册后，可以在网站上上传其个人或其子女的相片、图像、录像或其他资料（&ldquo;<strong>上传资料</strong>&rdquo;）。 </li>
                <li>网站使用者在网站上注册账户，和/或在网站上上传其个人或其子女资料的行为是其自愿的行为，并且明确表示其同意参与本次活动。在网站上注册账户，和/或在网站上提交其个人或其子女资料的该等网站使用者为本次活动的参与者（&ldquo;<strong>活动参与者</strong>&rdquo;）。</li>
                <li>活动参与者在此承诺并保证其有权上传、使用和授权第三人使用其提交的上传资料，有权使用和授权第三人商业性对外公开使用该等上传资料，并且该等使用或授权不侵犯上传资料所有人或其他权利人的任何权利。 </li>
                <li>活动参与者在此承诺并保证其有权使用相片肖像权人的肖像，并有权授权第三人公开商业性的使用该等相片肖像权人的肖像，并且不侵犯相片肖像权人的任何权利。 </li>
                <li>活动参与者在此授权雅漾和本次活动相关的广告商在本次活动期间及本次活动结束后1年内，为本次活动及其相关产品的宣传中无偿使用活动参与者的上述用户信息和上传资料，并且无需另行征求活动参与者的同意或确认。 </li>
                <li>活动参与者在此授权雅漾和本次活动相关的广告商在本次活动期间及本次活动结束后1年内，为本次活动及其相关产品的宣传中无偿公开商业性的使用上传资料中相片肖像权人的肖像。</li>
                <li>商业宣传推广包含任何形式的商业活动（包括但不限于数字媒体、户外广告、平面广告、挂历或其他商业性展览等各种商业性活动）。 </li>
                <li>活动参与者在此承诺并保证其将保护、赔偿并且使雅漾和相关广告商免受第三方因雅漾和相关广告商基于本次活动或活动结束后1年内因使用或进行的任何活动宣传和相关产品宣传而产生的针对雅漾和相关广告商因使用活动参与者提供的用户信息和/或上传资料所提出的任何诉讼、责任、损失、开支和花费赔偿要求。如若雅漾和相关广告商因使用活动参与者提供的用户信息和上传资料而遭受任何损失的，活动参与者应当赔偿雅漾和相关广告商的损失。</li>
                <li>活动参与者被随机抽中，有权获得活动产品的，活动参与者获得活动产品的权利不得自行撤销、转让或出售。活动参与者在成功领取活动产品后，不得退换。 </li>
                <li>如遇意外，雅漾无法提供指定活动产品的，雅漾有权以同等价值的产品代替，活动产品不得兑换现金或作价销售。 </li>
                <li>如因活动参与者个人原因不能领取活动产品的，视为其自动放弃该权利，雅漾有权不对其进行任何形式的补偿或赔偿。 </li>
                <li>如果发现活动参加者在本次活动中使用不正当的手段参与活动，雅漾有权在不事先通知的情况下取消其参加活动的资格。即使在活动参与者被随机抽中，并获得活动产品后，雅漾仍有权在不事先通知的情况下取消其参加活动的资格。雅漾有权不对其进行任何形式的补偿或赔偿。 </li>
                <li>雅漾不对因网络传输原因而导致参加者提交的信息错误或延误担任何责任。 </li>
                <li>雅漾、关联公司、广告公司、网络合作伙伴的员工及其家属不得参与此次活动，以示公允。 </li>
                <li>如遇不可抗力或政府管制原因，雅漾有权取消本次活动。雅漾有权不对活动参与者进行任何形式的赔偿。 </li>
                <li>本活动最终解释权归雅漾及皮尔法伯中国所有。 </li>
            </ul>
            <br clear="all" />
            <p>&nbsp;</p>
            <p>申请步骤-隐私条款<br />
                本网站的雅漾&ldquo;1000 Families  湿疹儿童优享乐生活&rdquo;关爱行动（&ldquo;本次活动&rdquo;）适用雅漾中国网站<a href="http://www.eau-thermale-avene.cn/"><strong>http://www.eau-thermale-avene.cn/</strong></a>的隐私条款和如下本次活动的隐私条款。本网站用户和活动参与者应当认真阅读雅漾中国网站的隐私条款和本次活动的隐私条款。网站用户和活动参与者不同意雅漾中国网站的隐私条款和本次活动的隐私条款的，应当立即停止使用网站和在网站上注册。使用和在本网站上注册的行为视为同意雅漾中国网站的隐私条款和本次活动的隐私条款，以及同意遵守该等隐私条款，并且受该等隐私条款的约束。 <br />
                如下本次活动的隐私条款是雅漾中国网站隐私条款的组成部分。若有冲突的，以如下隐私条款为准。 <br />
                为本活动的目的，雅漾中国网站的隐私条款和本次活动的隐私条款以下合称为&ldquo;隐私条款&rdquo;。<strong> </strong></p>
            <ul>
                <li>网站使用者在网站上注册账户时，会被要求填写如下真实的个人基本信息：姓名、身份证信息、地址、电话、电子邮箱、手机号码等的真实的个人信息（&ldquo;<strong>个人信息</strong>&rdquo;），和用户基本信息：用户名称、用户密码、用户头像等用户信息（&ldquo;<strong>用户信息</strong>&rdquo;）。网站使用者在成功注册后，可以在网站上上传其个人或其子女的相片、图像、录像或其他资料（&ldquo;<strong>上传资料</strong>&rdquo;）。 </li>
                <li>网站使用者在网站上注册账户，和/或在网站上上传提交其个人或其子女资料的行为是其自愿的行为，并且明确表示其同意参与本次活动。在网站上注册账户，和/或在网站上提交其个人或其子女资料的该等网站使用者为本次活动的参与者（&ldquo;<strong>活动参与者</strong>&rdquo;）。</li>
                <li>雅漾及其活动运营方承诺将为实现本次活动的目的合理使用活动参与者的个人信息。并且除非根据法律或政府的强制性规定，在未得到活动参与者的许可之前，雅漾及活动运营方承诺不将活动参与者的个人信息披露给无关的第三方。 </li>
                <li>在本次活动期间及本次活动结束后1年内，雅漾对活动参与者提供的用户信息和上传资料将公开用于本次活动及相关产品的商业宣传推广。</li>
                <li>活动参与者承诺并保证其在使用本网站过程中应当遵守中华人民共和国的相关法律法规，不进行任何涉嫌非法的行为或任何可能造成雅漾财产或名誉损失的行为。对于活动参与者违反法律法规的行为，由活动参与者自行承担法律相关责任，与雅漾和皮尔法伯中国无关。 </li>
            </ul>
        </div>
    </div>
</div>
<link href="<?=Yii::app()->baseUrl.'/'?>js/uploadify/uploadify.css" rel="stylesheet" type="text/css" />
