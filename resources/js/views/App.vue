<template>
    <div>
        <div v-if="this.$store.getters.isLogged">
            <nav-bar></nav-bar>
            <aside-menu :menu="menu"></aside-menu>
        </div>
        <router-view></router-view>

        <footer-bar></footer-bar>
    </div>

</template>

<script>
// @ is an alias to /src
import NavBar from '../components/NavBar'
import AsideMenu from '../components/AsideMenu'
import FooterBar from '../components/FooterBar'

export default {
    name: 'Home',
    components: {
        FooterBar,
        AsideMenu,
        NavBar
    },
    computed: {
        menu () {
            return [
                'Dashboard',
                [
                    {
                        to: '/',
                        icon: 'desktop-mac',
                        label: 'Dashboard'
                    }
                ],
                'Services',
                [
                    {
                        to: '/view',
                        label: 'Tables',
                        icon: 'table',
                        updateMark: true
                    },
                    {
                        to: '/                  ',
                        label: 'Forms',
                        icon: 'square-edit-outline'
                    },
                    {
                        to: '/profile',
                        label: 'Profile',
                        icon: 'account-circle'
                    },
                    {
                        label: 'Submenus',
                        subLabel: 'Submenus Example',
                        icon: 'view-list',
                        menu: [
                            {
                                href: '#void',
                                label: 'Sub-item One'
                            },
                            {
                                href: '#void',
                                label: 'Sub-item Two'
                            }
                        ]
                    }
                ],
                'About',
                [
                    {
                        href: 'https://admin-one.justboil.me',
                        label: 'Premium Demo',
                        icon: 'credit-card'
                    },
                    {
                        href: 'https://justboil.me/bulma-admin-template/one',
                        label: 'About',
                        icon: 'help-circle'
                    }
                ]
            ]
        }
    }
}
</script>
