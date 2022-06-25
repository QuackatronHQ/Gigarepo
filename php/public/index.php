<?php

// lint >= 8.0

require __DIR__ . '/../vendor/autoload.php';

\Sentry\init(['dsn' => 'https://195ec2f464294e729a9a377c16107d75@o994032.ingest.sentry.io/5952295']);

// $foo = new App\Foo();
// $foo->run();

// $bar = new App\Bar();
// $bar->run();
// $bar->echo();
// $bar->invalidTypeCast();
// var_dump($bar->requireParamAfterOptional());
// var_dump($bar->literalArrayItem());
// var_dump($bar->arrayWithoutDimForReading());
// $bar->undefinedConstant();

// $invalidMethodCalls = new App\InvalidCallMethodsCheck();
// echo $invalidMethodCalls->run();
// $invalidMethodCalls->usesVoid();

// $staticMethodCheck = new App\StaticMethodCallCheck();
// echo $staticMethodCheck->run();

// $staticMethodCheck = new App\StaticPropertyCallCheck();
// echo $staticMethodCheck->run();

// $definedVariableCheck = new App\DefinedVariableCheck();
// echo $definedVariableCheck->run();
// echo $definedVariableCheck->greet();

// $unableToAccessProperty = new App\UnableToAccessPropertyCheck();
// echo $unableToAccessProperty->run();

// $overridingMethodCheck = new App\OverridingMethodCheck();
// echo $overridingMethodCheck->run();

// $overridingMethodCheck = new App\NativeClosureReturnTypeHint();
// echo $overridingMethodCheck->run();

// $uninitializedProperty = new App\UninitializedPropertyCheck(1);
// echo $uninitializedProperty->run();

// $compactVarCheck = new App\CompactVariableCheck();
// print_r($compactVarCheck->display());

// $regexPatternCheck = new App\RegexPatternCheck();
// $regexPatternCheck->run();

// require_once __DIR__ . '/../utils/promotions.php';
// $promotions = new Promotions();
// var_dump($promotions);

// $instanceOfDefined = new App\InstanceOf\InstanceOfDefinedCheck();
// echo $instanceOfDefined->run();
// echo App\InstanceOf\definedCheck();

// $symbolExistsInGroupUse = new \App\SymbolExistInGroupUseCheck();
// $symbolExistsInGroupUse->run();

// $copyAction = new \App\Attributes\CopyFile();
// $copyAction->fileName = '/tmp/foo.jpg';
// $copyAction->targetDirectory = '/home/user';
// \App\Attributes\executeAction($copyAction);

// $mailchimp = new \App\ImplementsKeyword\Mailchimp();
// $mailchimp->run();

// $sendgrid = new App\ImplementsKeyword\Sendgrid();
// $sendgrid->run();

// $adminController = new App\ExtendsKeyword\AdminController();
// $adminController->index();
// $userController = new App\ExtendsKeyword\UserController();
// $userController->create();

// $user = new App\PromotedProperties\User();
// $user->setName('John', 'Doe');
// $member = new App\PromotedProperties\Member(['John', 'Doe']);

// $contr = new App\NewStatic\Controller('User');
// var_dump($contr->getController());
// $contr = new App\NewStatic\NewController(1);
// var_dump($contr->getController());

// $nullsafeInArrow = new App\Nullsafe\NullsafeInArrow();
// $nullsafeInArrow->run();
// $nullsafeRefReturn = new App\Nullsafe\NullsafeReferenceReturn();
// $nullsafeRefReturn->run();

// $funcParamTest = new App\CallToFunctionParam\FunctionParamTest();
// $funcParamTest->run();

// $abstractMethodInNonAbstractClass = new App\AbstractMethodInNonAbstractClass();
// var_dump($abstractMethodInNonAbstractClass);

// var_dump(App\ClassConstFetch\PhpVersion::PHP_80); // invalid: class "App\ClassConstFetch\PhpVersion" doesn't exists
// var_dump(self::PHP_74); // invalid: cannot use "self" outside of class scope
// var_dump(App\ClassConstFetch\Version::PHP_56); // invalid: class constant "PHP_56" is undefined
// var_dump(App\ClassConstFetch\Version::PHP_74); // invalid: Cannot access private constant
// $version = new App\ClassConstFetch\Version;
// var_dump($version::class); // note: will only work on PHP 8.0 or later

// $admin = new App\InterfaceExtends\Admin;
// var_dump($admin);

$abstractUndefined = new App\AbstractUndefinedMethod\Database();
$abstractUndefined->backup();
