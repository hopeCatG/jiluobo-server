<?php

namespace app\api\controller;

use app\api\lists\AccountLogLists;
use think\facade\Db;
use think\facade\Validate;

/**
 * 官网咨询
 * Class ConsultController
 * @package app\api\controller
 */
class ConsultController extends BaseApiController
{
    public array $notNeedLogin = ['add'];
    
    public function add()
    {
      
        // 接收前端 POST 参数
        $type = $this->request->post('type');
        $theme = $this->request->post('theme');
        $name = $this->request->post('name');
        $email = $this->request->post('email');
        $mobile = $this->request->post('mobile');
        $content = $this->request->post('content');
        $privacy = $this->request->post('privacy');
        $captchaCode = $this->request->post('captchaCode');
        
        // 参数校验
        $validate = Validate::rule([
            'name' => 'require|max:100',
            'email' => 'require|email|max:100',
            'mobile' => 'require|regex:/^1[3-9]\d{9}$/|max:20',
            'content' => 'require',
            'theme' => 'require|max:200',
            'privacy' => 'require|accepted',
        ])->message([
            'name.require' => '姓名不能为空',
            'email.require' => '邮箱不能为空',
            'email.email' => '邮箱格式不正确',
            'mobile.require' => '手机号不能为空',
            'mobile.regex' => '手机号格式不正确',
            'content.require' => '咨询内容不能为空',
            'theme.require' => '主题不能为空',
            'privacy.accepted' => '请同意隐私政策',
        ]);
        
        $data = [
            'name' => $name,
            'email' => $email,
            'mobile' => $mobile,
            'content' => $content,
            'theme' => $theme,
            'privacy' => $privacy,
        ];
        
        if (!$validate->check($data)) {
         
            return $this->fail($validate->getError());
        }
        
     
        
        // 转换咨询类型：前端传 type=generic 对应一般咨询，quote 对应报价咨询
        $typeMap = [
            'generic' => 1,  // 一般咨询
            'quote' => 2,    // 报价咨询
        ];
        $consultType = isset($typeMap[$type]) ? $typeMap[$type] : 1;
        
        // 构建入库数据
        $insertData = [
            'create_time' => time(),
            'update_time' => time(),
            'theme' => $theme,
            'name' => $name,
            'email' => $email,
            'mobile' => $mobile,
            'content' => $content,
            'type' => $consultType,
            'status' => 0,  // 默认未处理
        ];
        
        try {
            // 存入数据库
            $result = Db::name('consult')->insert($insertData);
            
            if ($result) {
                // 可选：发送邮件/短信通知管理员
                // $this->sendNotify($insertData);
                
                return $this->success('提交成功，我们会尽快与您联系');
            } else {
                return $this->fail('提交失败，请稍后重试');
            }
        } catch (\Exception $e) {
            var_dump($e);
           
            return $this->fail('系统繁忙，请稍后重试');
        }
    }
}