<?php

declare(strict_types=1);

use App\AbstractClasses\Radio;
use App\AbstractClasses\Text;
use App\LateStaticBindings\ClassA;
use App\LateStaticBindings\ClassB;
use App\MagicMethods\Invoice;
use App\Polymorphism\CollectorAgency;
use App\Polymorphism\DebtCollectionService;
use App\Polymorphism\SopranoService;
use App\Traits\AllInOneCoffeeMaker;
use App\Traits\CappuccinoMaker;
use App\Traits\CoffeeMaker;
use App\Traits\LatteMaker;


require __DIR__ . '/../vendor/autoload.php';

//$transaction1 = new Transaction(Status::PAID, 25, 'transaction 1');
//$transaction2 = new Transaction(Status::PAID, 125, 'transaction 2');
//$transaction3= new Transaction(Status::PAID, 100, 'transaction 3');
//$transaction4 = new Transaction(Status::DECLINED, 100, 'transaction 3');
//
//$reflectionProperty = new ReflectionProperty(Transaction::class, 'amount');
//$reflectionProperty->setAccessible(true);
//
//var_dump($reflectionProperty->getValue($transaction3));
//
//echo Transaction::getCount() . '<br/>';

//$transaction1->process();

//$toaster = new ToasterPro();

//$toaster->addSlice('bread');
//$toaster->addSlice('bread');
//$toaster->addSlice('bread');
//$toaster->addSlice('bread');
//$toaster->addSlice('bread');
//$toaster->toastBeagle();

//$fields =
//    [
//        new Text('TextField'),
//        new Checkbox('CheckboxField'),
//        new Radio('RadioField')
//    ];
//
//foreach ($fields as $field) {
//    echo $field->render() . '<br />';
//}

//$debtCollectionService = new DebtCollectionService();
//$collectorAgency = new CollectorAgency();
//$sopranoService = new SopranoService();
//
//$debtCollectionService->collectDebt($collectorAgency, $collectorAgency->getName());
//$debtCollectionService->collectDebt($sopranoService, $sopranoService->getName());


//$invoice = new Invoice();
//
//$invoice->process(12, 'value');
// echo $invoice . PHP_EOL;


//$classA = new ClassA();
//$classB = new ClassB();
//
//echo ClassA::getName() . PHP_EOL;
//echo ClassB::getName() . PHP_EOL;

//var_dump(ClassB::make());

$coffeeMaker = new CoffeeMaker();
$coffeeMaker->makeCoffee();

$latteMaker = new LatteMaker();
$latteMaker->makeCoffee();

$cappuccinoMaker = new CappuccinoMaker();
$cappuccinoMaker->makeCappuccino();



$coffeeMaker = new AllInOneCoffeeMaker();

$coffeeMaker->makeCoffee();
$coffeeMaker->makeLatte();
$coffeeMaker->makeCappuccino();








