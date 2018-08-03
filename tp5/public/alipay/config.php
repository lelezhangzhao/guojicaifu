<?php
$config = array (	
		//应用ID,您的APPID。
		'app_id' => "2016091800541656",

		//商户私钥
		'merchant_private_key' => "MIIEvAIBADANBgkqhkiG9w0BAQEFAASCBKYwggSiAgEAAoIBAQCaaXU5c0yiiHElS1kIHs4oTRAgWoa/gasFnugUI60HSJJkc1vHgQWmjQ3GXyGWeZjEZBUzdq/bgJOrhMkI4V69n2D6h6B7sUlTXJkJhQ8GBYHxwD+mZ4JZ7mBF7RHv9CTBdsZiIRNHgEOAdA9/ZwPSOxnycn3RcRmjPRFdhOh+Rd0gW252MPfArSBoTKsjGB5Xjw5QIju2tx7y3UTD650xo1++UuZihnjSUanfaaZFLI1WMZRS99yG+wQCzTQOFUJwfOQwib+NsCSY7m6njDG32RvvHJRb8qDKqm3BqZ0hFLNANPe4pPaNisKbo6ZqICgw/M3G6y37ExppVFAkvLc/AgMBAAECggEARnbHkt8F4snm8EDxMR51r7hzGoCVK0FuHROGDuK07DT28TYfdOxw+q810QfKmROGXmDZt/F6kO2c9dGTuCS4ikn4BHvuBWRC9PK1t71rvLC4uuyjXzmvJ4D7mA12eQzt1Qdxwogbdy6WH0FXbSlCeiaUUapjtjcpnu+YRBgJzM05Xk2H4rNJG7xfl/XmvkLIe6+is5OtbKBmdEO+Qpw1yV35w/AyTqiaLSeQWIcct7o1JkqDO6Zx2oSiAfg92xcb2UsDoYOzobmn22KTZ9S1UA19S0tpOM+XlYlcnayKzpKL0Ze0qm9yxd1YsM1DV/X4cYC+t2RYwmZgbEPEoGcegQKBgQDPESfy3Yhx26da9qtUMpP5G/sPvCYnm+zXgrgsyFphXvUljTZ3y67fxRCDw6rOwozvfsIP/gHgsQjdkg3D5bkO/2j1lpi8gJoWL2vjUEMoFe8VzycK2PdI1ynVtNH8ppFwqFRdIc+MOU7+9p/g9w4WT73tPFyN664M784iSwMbfwKBgQC+5tnKdwieJQDheX4Vg9pLTZHnC5AUIuOoi0lbe5ffbDz0FCURGX4C/aS9GFoSrWxpmK1znyKIlgIRJ8o3a4VtAN4iSAMZAOcrPc7f240qFcGtpLDkIhGNk+Fnnj0mv2h5E124pEWMP8Y7hAaAKfvWHo7viXX/SEPtbfvaQNtEQQKBgAfA5rQLY46P4QZg8i1m72+GgrImI2+cQRQYyviyT+ARhDBxxzZZJCUw5dtpOj4fvtNA9ddPdZaKSoCxdV5+fZ14Jt/7UaDNV/e4stuCJ+GaYKd6aEXZtfi+RczAxpQlUJDdXLtYBsODadfWOEpeNeLT/ZKijfyqdIv7dsaF9InVAoGAPVeq1i9HuqGDVfCXPkyfIaFsZ8TEaGQJqYgQa3AcjjOWpouumX8KieV9QTIJB4Vol8nyunuBOkiRo3eYuBQ5zJwBxRxEuo0auz9iMXa4NrTFBoosOTJlV4wUWxpy5feNl5JMhF9s5bM8fLVg7WAQR26MWZZfL0fGZA36Zth+XMECgYAjzeIDbbCcAmdpevlOCDfpvSwoBHdyGTCfhyQtHoStR54dkKIPFK4pnSxOsgq0SChoEhPYUq4IQswWmOuTcyesITFgBU3IFOliB9Cf2fstkqGUq08cpr0p0HTE6fbuTLcyKKNs70l+qiisSDO0rgVgbAyPHEzWMjQ+Wm0DEWy5DQ==",
		
		//异步通知地址
		'notify_url' => "http://www.zhouqy971.com",
		
		//同步跳转
		'return_url' => "http://www.zhouqy971.com",

		//编码格式
		'charset' => "UTF-8",

		//签名方式
		'sign_type'=>"RSA2",

		//支付宝网关
		'gatewayUrl' => "https://openapi.alipaydev.com/gateway.do",

		//支付宝公钥,查看地址：https://openhome.alipay.com/platform/keyManage.htm 对应APPID下的支付宝公钥。
		'alipay_public_key' => "MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAmml1OXNMoohxJUtZCB7OKE0QIFqGv4GrBZ7oFCOtB0iSZHNbx4EFpo0Nxl8hlnmYxGQVM3av24CTq4TJCOFevZ9g+oege7FJU1yZCYUPBgWB8cA/pmeCWe5gRe0R7/QkwXbGYiETR4BDgHQPf2cD0jsZ8nJ90XEZoz0RXYTofkXdIFtudjD3wK0gaEyrIxgeV48OUCI7trce8t1Ew+udMaNfvlLmYoZ40lGp32mmRSyNVjGUUvfchvsEAs00DhVCcHzkMIm/jbAkmO5up4wxt9kb7xyUW/KgyqptwamdIRSzQDT3uKT2jYrCm6OmaiAoMPzNxust+xMaaVRQJLy3PwIDAQAB",
);