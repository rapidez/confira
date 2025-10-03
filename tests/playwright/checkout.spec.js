import { test, expect } from '@playwright/test'
import { BasePage } from '@rapidez/core/tests/playwright/pages/BasePage.js'
import { ProductPage } from '@rapidez/core/tests/playwright/pages/ProductPage.js'
import { CheckoutPage } from '@rapidez/checkout-theme/tests/playwright/pages/CheckoutPage.js'

test('as guest', BasePage.tags, async ({ page }) => {
    const productPage = new ProductPage(page)
    const checkoutPage = new CheckoutPage(page)

    await productPage.addToCart(process.env.PRODUCT_URL_SIMPLE)
    await checkoutPage.checkout(`wayne+${crypto.randomUUID()}@enterprises.com`, false, false, [
        'login',
        'credentials',
        'payment',
        'success',
    ])
})
