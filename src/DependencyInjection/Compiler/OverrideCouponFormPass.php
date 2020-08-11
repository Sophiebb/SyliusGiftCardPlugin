<?php

declare(strict_types=1);

namespace Setono\SyliusGiftCardPlugin\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

final class OverrideCouponFormPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container): void
    {
        $useSameInput = (bool) $container->getParameter('setono_sylius_gift_card.cart.use_same_input_for_promotion_and_gift_card');

        if ($useSameInput) {
            return;
        }

        $container->removeDefinition('setono_sylius_gift_card.form.type.promotion_coupon_to_code');
    }
}