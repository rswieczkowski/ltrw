<?php

declare(strict_types=1);

use App\AnonymousClasses\ClassA;
use App\AnonymousClasses\MyInterface;
use App\ObjectComparison\Customer;
use App\ObjectComparison\CustomInvoice;
use App\ObjectComparison\Invoice;


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

//$coffeeMaker = new CoffeeMaker();
//$coffeeMaker->makeCoffee();
//
//$latteMaker = new LatteMaker();
//$latteMaker->makeCoffee();
//
//$cappuccinoMaker = new CappuccinoMaker();
//$cappuccinoMaker->makeCappuccino();
//
//
//
//$coffeeMaker = new AllInOneCoffeeMaker();
//
//$coffeeMaker->makeCoffee();
//$coffeeMaker->makeLatte();
//$coffeeMaker->makeCappuccino();


//$obj = new class(1, 2, 3) implements MyInterface {
//
//    public function __construct
//    (
//        private int $x,
//        private int $y,
//        private int $z
//    ) {
//    }
//
//
//};
//
//foo($obj);
//
//function foo(MyInterface $obj): void
//{
//    var_dump($obj);
//}

//$obj = new ClassA(5,10);
//
//var_dump($obj->bar());

$invoice1 = new Invoice(new Customer('Customer 1'), 25, 'Invoice');
$invoice2 = new Invoice(new Customer('Customer 2'), 25, 'Invoice');
$invoice4 = new CustomInvoice(new Customer('Customer 3'), 25, 'Invoice');

$invoice3 = $invoice1;

echo '$invoice1 == $invoice2' . PHP_EOL;
var_dump($invoice1 == $invoice2);

echo '$invoice1 === $invoice2' . PHP_EOL;
var_dump($invoice1 === $invoice2);

$invoice1->amount = 100;

var_dump($invoice1, $invoice3);

echo '$invoice3 == $invoice1' . PHP_EOL;
var_dump($invoice3 == $invoice1);

echo '$invoice3 === $invoice1' . PHP_EOL;
var_dump($invoice3 === $invoice1);

echo '$invoice2 == $invoice4' . PHP_EOL;
var_dump($invoice2 == $invoice4);

echo '$invoice2 === $invoice4' . PHP_EOL;
var_dump($invoice2 === $invoice4);

var_dump($invoice2, $invoice4);

var_dump($invoice1 < $invoice2);